<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::get();
        $gurus = Guru::get();
        return view('admin.mapel.index', compact('mapels', 'gurus'));
    }

    public function store(Request $request)
    {
        $mapels = Mapel::create($request->all());
        return redirect()->back()->with('message', 'Berhasil Menambah Mapel');
    }

    public function update(Request $request, $id)
    {
        $mapels = Mapel::find($id);
        $mapels->update($request->all());
        return redirect()->back()->with('message', 'Berhasil Mengupdate Mapel');
    }

    public function destroy($id)
    {
        $mapels = Mapel::find($id)->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Mapel');
    }
}
