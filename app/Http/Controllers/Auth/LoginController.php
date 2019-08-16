<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Illuminate\Http\Request;

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
    protected $redirectTo = 'driver/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function customLogin(Request $request)
    {
        $user = User::where('no_pol', '=', $request->no_pol)->first();
        if(empty($user)) {
<<<<<<< HEAD
            $error = 'Nomor Polisi atau password yang anda masukkan salah! | Pastikan Nomor Polisi yang anda masukkan tidak memakai spasi/jarak.';
=======
            $error = ['error' => 'Nomor Polisi atau password yang anda masukkan salah!'];
>>>>>>> e351f4ef39b96e1f2fba4070859ecb010bc64bf6
            return redirect()->back()->withErrors($error);
        }
        Auth::login($user);
        return redirect()->route('driver.index');
    }
}
