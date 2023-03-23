<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index() {
        $ujians = Ujian::get();
        $mapels = Mapel::get();
        return view('admin.ujian.index',compact('ujians','mapels'));
    }

    public function store(Request  $request) {
        $ujians = Ujian::create($request->all());
        return redirect()->back()->with('message', 'Berhasil Menambah Ujian');
    }

    public function update(Request $request, $id)
    {
        $ujians = Ujian::find($id);
        $ujians->update($request->all());
        return redirect()->back()->with('message', 'Berhasil Mengupdate Ujian');
    }

    public function destroy($id)
    {
        $ujians = Ujian::find($id)->delete();
        return redirect()->back()->with('message', 'Berhasil Menghapus Ujian');
    }

}
