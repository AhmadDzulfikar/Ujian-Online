<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JawabanSiswa;
use App\Models\Mapel;
use App\Models\Soal;
use App\Models\Token;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    public function index()
    {
        $mapels = Mapel::get();
        $ujians = Ujian::get();
        $token = Token::first();
        return view('siswa.ujian.konfirmasi', compact('mapels', 'ujians', 'token'));
    }

    public function submit_token(Request $request)
    {
        $ujian = Ujian::where('id', $request->ujian_id)->first();
        $token = Token::where('token', $request->token)->first();

        // kondisi kalo tokennya AUTO
        if ($request->token == 'AUTO' && Token::where('status', 'enabled')) {
            $enkripsi = base64_encode($ujian->nama) . '|' . base64_encode($ujian->created_at);
            return redirect("siswa/soal-ujian/$ujian->nama/$enkripsi");
        }
        // kondisi kalo token salah
        if (!$token) {
            return redirect()->back()
                ->with('message', 'Token Salah');
        }
        // ngecek siswa udah ngerjain ujian ini apa belom lewat soal yang udah dikerjain ama siswa
        $cek_ujian = JawabanSiswa::whereIn('siswa_id', [Auth::guard('siswa')->user()->id])
            ->whereHas('soal', function ($q) use ($ujian) {
                $q->where('ujian_id', $ujian->id)
                    ->whereHas('ujian', function ($q2) use ($ujian) {
                        $q2->where('id', $ujian->id);
                    });
            })->first();
        // ngecek ujian
        if ($cek_ujian != null) {
            return redirect()->back()
                ->with('message', 'Anda Sudah Mengerjakan Ujian Ini');
        }
        // update token baru kalo token udah kurang dari jam sekarang
        if ($token->expired_date <= date('Y-m-d H:i:s')) {
            $token->update([
                'token' => strtoupper(Str::random(6)),
                'expired_date' => Carbon::now()->addMinutes(10)
            ]);
            return redirect()->back()
                ->with('message', 'Token Salah');
        }
        // buat url jadi enkripsi
        $enkripsi = base64_encode($ujian->nama) . '|' . base64_encode($ujian->created_at);
        return redirect("siswa/soal-ujian/$ujian->nama/$enkripsi");
    }

    public function soal_ujian($ujian, $enkripsi)
    {
        $split = explode('|', $enkripsi);
        $nama_ujian = base64_decode($split[0]);
        $created_at = base64_decode($split[1]);

        $get_ujian = Ujian::where('nama', $ujian)->first();
        if ($ujian == $nama_ujian && $created_at == $get_ujian->created_at) {
            $soals = Soal::with('jawaban_siswas')->where('ujian_id', $get_ujian->id)->inRandomOrder()->get();
            return view('siswa.ujian.soal', compact('soals', 'get_ujian'));
        } else {
            return redirect('siswa/konfirmasi-ujian');
        }
    }

    public function submit_ujian(Request $request)
    {
        if ($request->answer == null) {
            return 'isi jawaban anda';
        } else {
            foreach ($request->answer as $key => $jawaban) {
                $jawaban_siswa = JawabanSiswa::create([
                    'soal_id' => $key++,
                    'siswa_id' => $request->siswa_id,
                    'jawaban' => $jawaban
                ]);
            }
        }
    }

    public function submit_radio_button(Request $request)
    {
        $cek_jawaban = JawabanSiswa::where('siswa_id', $request->siswa_id)
            ->where('soal_id', $request->soal_id)
            ->whereHas('soal', function ($q) use ($request) {
                $q->where('ujian_id', $request->ujian_id);
            })
            ->first();
        if ($cek_jawaban) {
            $update_jawaban = JawabanSiswa::where('soal_id', $request->soal_id)
                ->where('siswa_id', $request->siswa_id)
                ->update([
                    'jawaban' => $request->answer
                ]);
        } else {
            $submit = JawabanSiswa::create([
                'siswa_id' => $request->siswa_id,
                'soal_id' => $request->soal_id,
                'jawaban' => $request->answer
            ]);
        }
    }

    public function logout_ujian()
    {
        return view('siswa.ujian.logout');
    }
}
