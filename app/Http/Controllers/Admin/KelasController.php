<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::get();
        return view('admin.kelas.index',compact('kelas'));
    }

    public function store(Request $request)
    {
        $mapels = Kelas::create($request->all());
        return redirect()->back()->with('message', 'Berhasil Menambah Kelas');
    }

    public function update(Request $request, $id)
    {
        $mapels = Kelas::find($id);
        $mapels->update($request->all());
        return redirect()->back()->with('message', 'Berhasil Mengupdate Kelas');
    }

    public function destroy($id)
    {
        $mapels = Kelas::find($id)->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Kelas');
    }
}