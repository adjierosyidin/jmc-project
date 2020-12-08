<?php

namespace App\Http\Controllers;


use App\User;
use App\UserRole;
use App\Transaksi;
use App\Dompet;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        \App::setLocale('id');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function all_member()
    {
        // $data['users'] = User::whereHas(
        //     'role', function($q){
        //         $q->where('nm_role', 'User');
        //     }
        // )->where('activated', 'yes')->get();

        $data['users'] = User::where('id', '!=', 1)
        ->where('activated', 'yes')->get();

        return view('admin.allmember')->with($data);
    }

    public function pending()
    {
        $data['users'] = User::where('activated', '=', 'no')->get();

        $data['allusers'] = User::all()->count();

        $data['activated'] = User::where('activated', 'yes')->count();

        return view('admin.pending')->with($data);
    }

    public function getParentID($username)
    {
        $parent = User::where('username', $username)
        ->where('activated', 'yes')->first();
    
        if($parent == null){
            throw new ModelNotFoundException('ID User '. $username. ' tidak tersedia/belum diaktifkan' );
        }

        return $parent->id;
    }
    
    public function pay($parent, $jumlah, $type) {
        
        if($dompet = Dompet::where('id_user',  $parent->id)->first()) {
            $amount =  $dompet->amount + $jumlah;
            $dompet->amount = $amount;
            $dompet->save();
            
            Transaksi::create(['id_user' => $parent->id,
            'amount' => $jumlah, 'type'=> $type, 'status' => 'successful']);
        } else {
            $amount =  $jumlah;
            Dompet::create(['id_user' =>  $parent->id, 'amount' => $jumlah]);

            Transaksi::create(['id_user' => $parent->id,
                'amount' => $amount, 'type'=> $type, 'status' => 'successful']);
        }
    }

    public function activateUser(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        $user_id = $user->id;

        DB::beginTransaction();

        try {

            //Bayar Bonus Referral
            if($user_id == 1) {
                $parent_id = 0;
            } else {
                $parent = DB::table('users')->where('username', $request->by)->first();
                $type = "Referral Bonus";
                $this->pay($parent, $this->referralBonus, $type);
                $parent_id =  $this->getParentID($parent->username);
            }
            
            //Aktifkan User
            DB::table('users')
            ->where('id', $user_id)
            ->update(['activated' => 'yes',
            'activated_by' => Auth::id(), 'activated_at' => Carbon::now()
            ]);

            $query = "
                INSERT INTO user_tree (ancestor,descendant,depth)
                SELECT ancestor, {$user_id}, depth+1
                FROM user_tree
                WHERE descendant = {$parent_id}
                UNION ALL SELECT {$user_id}, {$user_id}, 0";

            //connect parent to user in tree
            $tree = DB::statement($query);

            //Update kolom id_parent
            DB::table('users')
            ->where('id', $user_id)
            ->update(['id_parent' => $parent_id]);

            DB::table('users')->where('id', $parent_id)->increment('direct_downlines');



        } catch (\Exception $e) {
            DB::rollback();

            $request->session()->flash('error', $e->getMessage());
            return redirect()->back();
        }

        DB::commit();

        $request->session()->flash('success', $user->username. ' telah berhasil diaktivasi!');
        return back();

    }

    public function reward()
    {
        $data['users'] = User::where('id', '!=', 1)
        ->where('activated', 'yes')->get();

        return view('admin.reward')->with($data);
    }

    public function user_admin()
    {
        $data['users'] = User::where('activated', 'yes')
        ->where('id', '!=', 1)->get();

        $data['roles'] = UserRole::all();

        return view('admin.user_admin')->with($data);
    }

    public function update_role(Request $request, $id)
    {
        $request->validate([
            'id_role' => 'required',
        ]);

        User::where('id', $id)
        ->update(
            [
                'id_role' => $request->id_role,
            ]
        );
        $request->session()->flash('success', 'Role telah berhasil diubah');
        return redirect()->back();
    }

    public function log_user()
    {
        $data['transaksis'] = Transaksi::all();

        return view('admin.log_user')->with($data);
    }

    public function reset_password()
    {   
        $data['users'] = User::where('activated', 'yes')
        ->where('id', '!=', 1)->get();

        return view('admin.reset_password')->with($data);
    }

    public function exec_reset_password(Request $request, $id)
    {   
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = User::where('id', $id)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with('success','Password berhasil direset!');
    }
}
