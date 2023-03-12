<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function get_ujian(Request $request)
    {
        $mapel_id = $request->mapel_id;
        $ujian = Ujian::where('mapel_id', $mapel_id)->get();
        return $ujian;
    }
}
