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
            'kelas' => $request->kelas
        ]);

        if ($admin) {
            return redirect()->back()->with('message', 'Berhasil Menambah Data Admin');
        }
        return redirect()->back()->with('message', 'Gagal Menambah Data Admin');
    }
}
