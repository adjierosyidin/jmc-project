<?php

namespace App\Http\Controllers;

use App\User;
use App\UserTree;
use App\MstBank;
use App\Dompet;
use App\MstProvinsi;
use App\MstKabupaten;
use App\MstKecamatan;
use App\Transaksi;
use App\UserBank;
use App\AccountActivation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'not_expired']);
        \App::setLocale('id');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $expired = User::where('username', Auth::user()->username)
        ->where('activated', '=', 'no')
        ->where('created_at', '<', Carbon::now()->subDays(1))->get();

        dd($expired); */

        $data['mstjoin'] = AccountActivation::where('id', 1)->first();

        $data['sponsor'] = User::where('username', Auth::user()->referrer) -> first();

        return view('users.dashboard')->with($data);
    }

    public function pending_activation() 
    {
        $data['users'] = User::where('activated', 'no')
            ->where('referrer', '=', Auth::user()->username)
            ->get();

        // return response()->json($data['users']);

        return view('users.pending_activation')->with($data);
    }

    public function getDownlines($level) {
        $theLevel = User::select(DB::raw('users.*, user_tree.*'))
        ->where('user_tree.ancestor', '=', Auth::id())
        ->where('user_tree.depth', '=', $level)
        ->join('user_tree', 'users.id', '=', 'user_tree.descendant')
        ->get();

        return $theLevel;
    }

    public function myreferrals() {

        $getdepth = UserTree::select(DB::raw('user_tree.depth'))
        ->where('ancestor', Auth::id())
        ->orderBy('depth', 'desc')->first();

        if($getdepth!=null){
            for($i = 1; $i <= $getdepth->depth; $i++){
                $level["level$i"] = $this->getDownlines($i);
            };

            $level['jumlah'] = $getdepth->depth;
        } else {
            $level['jumlah'] = 0;
        }

        return view('users.myreferrals')->with($level);
    }

    public function myprofile()
    {
        $data['users'] = User::where('id', Auth::id())->first();
        $data['provinsis'] = MstProvinsi::all();
        $data['kabupatens'] = MstKabupaten::where('kd_provinsi', Auth::user()->kd_provinsi)->get();
        $data['kecamatans'] = MstKecamatan::where('kd_kabupaten', Auth::user()->kd_kabupaten)->get();
        $data['banks'] = MstBank::all();
        $data['userbank'] = UserBank::where('id_user', Auth::id())->first();

        return view('users.myprofile')->with($data);
    }

    public function get_by_provinsi($provinsi)
    {
        return MstKabupaten::where('kd_provinsi', '=', $provinsi)->get();
    }

    public function get_by_kabupaten($kabupaten)
    {
        return MstKecamatan::where('kd_kabupaten', '=', $kabupaten)->get();
    }

    public function edituser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'telp' => 'required|numeric|digits_between:11,13',
            'alamat' => 'required',
            'kd_provinsi' => 'required',
            'kd_kabupaten' => 'required',
            'kd_kecamatan' => 'required',
        ]);

        User::where('id', $id)
        ->update(
            [
                'name' => $request->name,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'kd_provinsi' => $request->kd_provinsi,
                'kd_kabupaten' => $request->kd_kabupaten,
                'kd_kecamatan' => $request->kd_kecamatan,
            ]
        );
        $request->session()->flash('success', 'Data Pribadi telah berhasil diubah');
        return redirect('profile');
    }

    public function ganti_password(Request $request)
    {
        if (!(Hash::check($request->password_lama, Auth::user()->password))) {
            return redirect()->back()->with('error','Password lama salah, silahkan ulangi!');
        }

        if(strcmp($request->password_lama, $request->password) == 0){
            return redirect()->back()->with('error','Password baru tidak boleh sama dengan password lama, silahkan ulangi');
        }

        if(!(strcmp($request->password_confirmation, $request->password)) == 0){
            return redirect()->back()->with('error','Password baru harus sama dengan konfirmasi password, silahkan ulangi');
        }

        $request->validate([
            'password_lama' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with('success','Password berhasil diperbaharui!');
    }

    public function validator(array $data) {
        return Validator::make($data, [
            'kd_bank' => 'required',
            'no_rek' => 'required|numeric',
            'nama_pemilik' => 'required|string',
        ]);
    }

    public function addbank(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $data = $request->all();
        $data['id_user'] = Auth::id();

        UserBank::create($data);

        $request->session()->flash('success', 'Data Bank telah berhasil ditambahkan');
        return redirect('profile');
    }

    public function updatebank(Request $request, $id)
    {
        $request->validate([
            'kd_bank' => 'required',
            'no_rek' => 'required|numeric',
            'nama_pemilik' => 'required|string',
        ]);

        UserBank::where('kd_bank', $id)
        ->update(
            [
                'kd_bank' => $request->kd_bank,
                'no_rek' => $request->no_rek,
                'nama_pemilik' => $request->nama_pemilik,
            ]
        );
        $request->session()->flash('success', 'Data Bank telah berhasil diubah');
        return redirect('profile');
    }

    public function bonus()
    {
        $data['dompet'] = Dompet::where('id_user', Auth::id())->first();
        $data['transaksis'] = Transaksi::where('id_user', Auth::id())->get();

        return view('users.bonus')->with($data);
    }
}
