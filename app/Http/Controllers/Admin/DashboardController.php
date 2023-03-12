<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $siswa = Siswa::count();
        // $ujian = Ujian::where('waktu_mulai', != 'null' );

        return view('admin.dashboard', compact('guru', 'kelas', 'mapel', 'siswa'));
    }
}
