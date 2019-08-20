<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Auth;
use Date;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $guard = 'admin';
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegisterForm()
    {
        return view('auth.adminRegister');
    }

    public function guard()
    {
        return auth()->guard('admin');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $getLastCode = Admin::orderBy('id', 'DESC')->first();
        if(empty($getLastCode)) {
            $getLastCode = 1;
        } else {
            $getLastCode = substr($getLastCode, -1);
        }
        $generateCodeAdmin = 'SA'.date('His').sprintf('%04d', $getLastCode);
        $file = $request->file('profile_img');
        $filename = date('Y_m_d_His').'_'.$generateCodeAdmin.".".$file->getClientOriginalExtension();
        Admin::create([
            'code_admin' => $generateCodeAdmin,
            'name' => $request->name,
            'email' => $request->email,
            'profile_img' => $filename,
            'level' => 'Super Administrator',
            'sub_level' => 'Super Admin',
            'password' => bcrypt($request->password),
        ]);
        $file->move('img/admin/profile/', $filename);
        return redirect()->route('admin.login')->with('success','Registration Success');
    }
}
