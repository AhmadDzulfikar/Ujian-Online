<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::now()->format("Y-m-d");
        $dt = Carbon::now();

        $guru = Guru::count();
        $kelas = Kelas::count();
        $mapel = Mapel::count();
        $siswa = Siswa::count();
        $ujians = Ujian::where('tanggal', $tanggal)->get();

        return view('admin.dashboard', compact('guru', 'kelas', 'mapel', 'siswa', 'ujians', 'dt'));
    }
}
