<?php

namespace App\Http\Controllers\Proktor;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;


class GenerateTokenController extends Controller
{
    public function index()
    {
        $tokens = Token::get();
        return view('proktor.generate-token', compact('tokens'));
    }

    public function store(Request $request)
    {
        $token = Token::first();
        $tokens = strtoupper(Str::random(6));
        $token->update([
            'token' => $tokens,
            'expired_date' => Carbon::now()->addMinutes(10)
        ]);
        // dd($token);
        return redirect()->back();
    }
}
