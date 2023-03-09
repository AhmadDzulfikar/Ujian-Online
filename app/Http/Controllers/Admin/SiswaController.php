<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $kelas = Kelas::all();

        return view('admin.siswa.index', compact('siswas', 'kelas'));
    }

    public function store(Request $request)
    {
        $admin = Siswa::create([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'kelas_id' => $request->kelas_id
        ]);

        if ($admin) {
            return redirect()->back()->with('message', 'Berhasil Menambah Data Admin');
        }
        return redirect()->back()->with('message', 'Gagal Menambah Data Admin');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        if ($siswa) {
            return redirect()->back()->with('status', 'success')->with('message', 'Berhasil Mengubah Data Siswa');
        }
        return redirect()->back()->with('status', 'danger')->with('message', 'gagal Mengubah Data Siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        if ($siswa) {
            return redirect()->back()->with('status', 'success')->with('message', 'Berhasil Menghapus Data Siswa');
        }
        return redirect()->back()->with('status', 'danger')->with('message', 'Gagal Menghapus Data Siswa');
    }
}
