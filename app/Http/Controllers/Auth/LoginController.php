<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:proktor')->except('logout');
        $this->middleware('guest:guru')->except('logout');
        $this->middleware('guest:siswa')->except('logout');
        Session::put('backUrl', URL::previous());
    }


    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin/dashboard');
        }
        if (Auth::guard('proktor')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/proktor/dashboard');
        }
        if (Auth::guard('guru')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/guru/dashboard');
        }
        if (Auth::guard('siswa')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/siswa/konfirmasi-ujian');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

}
