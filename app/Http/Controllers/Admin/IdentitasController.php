<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index() {
        $identitas = Identitas::first();
        return view('admin.identitas', compact('identitas'));
    }

    public function update(Request $request)
    {

        $identitas = Identitas::first();
        if ($request->foto == null) {
            $identitas->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'alamat' => $request->alamat,
            ]);
        } else {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
            $identitas->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'alamat' => $request->alamat,
                "foto" => "/img/" . $imageName
            ]);
        }
    return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');

    }
}
