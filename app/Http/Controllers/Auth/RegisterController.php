<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Input;
use Str;

class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/driver/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'photo_profile' => ['image', 'mimes:png,jpg,jpeg'],
            'photo_ktp' => ['image', 'mimes:png,jpg,jpeg'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fileNameProfile = 'null';
        $fileNameKtp = 'null';
        $request = request();
        if ($request->hasFile('photo_profile') && $request->hasFile('photo_ktp')) {
            $ext_profile = $request->file('photo_profile')->getClientOriginalExtension();
            $ext_ktp = $request->file('photo_ktp')->getClientOriginalExtension();
            $fileNameProfile = 'PP_'.date('Y_m_d_His')."_".Str::slug($data['name'], '_').'.'.$ext_profile;
            $fileNameKtp = 'KTP_'.date('Y_m_d_His')."_".Str::slug($data['name'], '_').'.'.$ext_profile;
            $request->file('photo_profile')->move('img/profile/', $fileNameProfile);
            $request->file('photo_ktp')->move('img/ktp/', $fileNameKtp);
        }
        return User::create([
            'name' => $data['name'],
            'photo_profile' => $fileNameProfile,
            'photo_ktp' => $fileNameKtp,
            'no_telp' => $data['no_telp'],
            'no_pol' => $data['no_pol'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
