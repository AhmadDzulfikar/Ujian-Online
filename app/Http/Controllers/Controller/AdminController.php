<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function store_guru(Request $request)
    {
        $guru = Guru::create([
            'nip' => $request->nip,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email
        ]);

        if ($guru) {
            return redirect()->back()->with('message', 'Berhasil Menambah Data Guru');
        }
        return redirect()->back()->with('message', 'Gagal Menambah Data Guru');
    }

    public function index()
    {
        $guru = Guru::all();

        return view('admin.dashboard', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->update($request->all());

        if ($guru) {
            return redirect()->back()->with('status', 'success')->with('message', 'Berhasil Mengubah Data Guru');
        }
        return redirect()->back()->with('status', 'danger')->with('message', 'gagal Mengubah Data Guru');
    }

    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();

        if ($guru) {
            return redirect()->back()->with('status', 'success')->with('message', 'Berhasil Menghapus Data Guru');
        }
        return redirect()->back()->with('status', 'danger')->with('message', 'Gagal Menghapus Data Guru');
    }
}
