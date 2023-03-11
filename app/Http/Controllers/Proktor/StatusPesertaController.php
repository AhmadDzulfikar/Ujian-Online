<?php

namespace App\Http\Controllers\Proktor;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class StatusPesertaController extends Controller
{
    public function index()
    {
        $peserta = Siswa::all();
        // dd(session()->all());
        return view('proktor.status-peserta.index', compact('peserta'));
    }

    //reset login siswa
    public function reset_login(Request $request)
    {
        $peserta = Siswa::where('id' , $request->id)->get();
        // dd($peserta);

    }
}
