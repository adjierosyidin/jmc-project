<?php

namespace App\Http\Controllers;

use App\MstBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MstBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        \App::setLocale('id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = MstBank::all();
        return view('admin.mstbank.mstbank_index')->with(['banks' => $bank]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mstbank.mstbank_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validator(array $data) {
        return Validator::make($data, [
            'kd_bank' => 'required|string',
            'nama_bank' => 'required|string',
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $data = $request->all();

        MstBank::create($data);

        $request->session()->flash('success', 'Data Bank telah berhasil ditambahkan');
        return redirect('masterbank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.mstbank.mstbank_edit', ['bank' => MstBank::where('kd_bank', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bank' => 'required|string',
        ]);
        
        MstBank::where('kd_bank', $id)
        ->update(
            ['nama_bank' => $request->nama_bank]
        );

        $request->session()->flash('success', 'Data Bank telah berhasil diubah');
        return redirect('masterbank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mstbank = MstBank::where('kd_bank', $id)->first();
        $mstbank->delete();

        return redirect()->back()->with('success', 'Data Bank berhasil dihapus');;
    }
}
