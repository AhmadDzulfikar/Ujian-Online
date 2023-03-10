<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Soal;
use App\Models\Token;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UjianController extends Controller
{
    public function index()
    {
        $mapels = Mapel::get();
        $ujians = Ujian::get();
        return view('siswa.ujian.konfirmasi', compact('mapels', 'ujians'));
    }

    public function submit_token(Request $request)
    {
        $ujian = Ujian::where('id', $request->ujian_id)->first();
        $token = Token::where('token', $request->token)->first();
        if (!$token) {
            return redirect()->back()
                ->with('message', 'Token Salah');
        } else {
            if ($token->expired_date <= date('Y-m-d H:i:s')) {
                $token->update([
                    'token' => strtoupper(Str::random(6)),
                    'expired_date' => Carbon::now()->addMinutes(10)
                ]);
                return redirect()->back()
                    ->with('message', 'Token Salah');
            }

            $enkripsi = base64_encode($ujian->nama) . '|' . base64_encode($ujian->created_at);
            return redirect("siswa/soal-ujian/$ujian->nama/$enkripsi");
        }
    }

    public function soal_ujian($ujian, $enkripsi)
    {
        $split = explode('|', $enkripsi);
        $nama_ujian = base64_decode($split[0]);
        $created_at = base64_decode($split[1]);

        $get_ujian = Ujian::where('nama', $ujian)->first();
        if ($ujian == $nama_ujian && $created_at == $get_ujian->created_at) {
            $soals = Soal::where('ujian_id', $get_ujian->id)->get();
            return view('siswa.ujian.soal', compact('soals'));
        } else {
            return redirect('siswa/konfirmasi-ujian');
        }
    }
}
