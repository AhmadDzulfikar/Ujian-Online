<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\Ujian;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class GenerateTokenController extends Controller
{
    public function index()
    {
        $ujians = Ujian::get();
        return view('admin.generate-token', compact('ujians'));
    }

    public function generate_token_ujian(Request $request)
    {
        $token = strtoupper(Str::random(6));
        foreach ( $request->ujian_id as $ujian ) {
            $tokens = Token::create([
                'token' => $token,
                'ujian_id' => $ujian,
                'expired_date'=> '05:00:00'
            ]);
            // dd($tokens);
        }
    }
}
