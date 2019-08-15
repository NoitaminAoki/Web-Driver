<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
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
        $request::validate(['no_pol' => ['required'], 'password' => ['required']]);
        $user = User::where('no_pol', '=', $request->no_pol)->first();
        if(empty($user)) {
            $error = ['user' => 'Nomor Polisi atau password yang anda masukkan salah!'];
            return redirect()->back()->withErrors(['error' => $error]);
        }
        Auth::login($user);
        return redirect()->route('driver.index');
    }
}
