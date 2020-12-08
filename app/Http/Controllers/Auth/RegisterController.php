<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\MstProvinsi;
use App\MstKabupaten;
use App\MstKecamatan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

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
        App::setLocale('id');
        return Validator::make($data, [
            'nik' => ['required', 'numeric', 'digits:16'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:users', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp' => ['required', 'numeric', 'digits_between:11,13'],
            'alamat' => ['required'],
            'kd_provinsi' => ['required'],
            'kd_kabupaten' => ['required'],
            'kd_kecamatan' => ['required'],
            'referrer' => ['required', 'exists:users,username'],
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
        return User::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'alamat' => $data['alamat'],
            'kd_provinsi' => $data['kd_provinsi'],
            'kd_kabupaten' => $data['kd_kabupaten'],
            'kd_kecamatan' => $data['kd_kecamatan'],
            'referrer' => $data['referrer'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        $provinsis=MstProvinsi::all();

        $user = User::where('username', $request->ref)
            ->where('activated', '=', 'yes')
            ->first();
        if (!$user) {
            $data['ref'] = "";
        } else {
            $data['ref'] = $user->username;
        }

        return view('auth.register', compact('provinsis'))->with($data);
    }

    public function get_by_provinsi($provinsi)
    {
        return MstKabupaten::where('kd_provinsi', '=', $provinsi)->get();
    }

    public function get_by_kabupaten($kabupaten)
    {
        return MstKecamatan::where('kd_kabupaten', '=', $kabupaten)->get();
    }

}
