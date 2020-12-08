<?php

namespace App\Http\Controllers;

use App\AccountActivation;
use Illuminate\Http\Request;

class MstJoinController extends Controller
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
        $data['mstjoins'] = AccountActivation::all();

        return view('admin.mstjoin.mstjoin_index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.mstjoin.mstjoin_edit', ['mstjoin' => AccountActivation::where('id', $id)->first()]);
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
            'biaya_join' => 'required|numeric',
            'nama_bank' => 'required|string',
            'no_rek' => 'required|numeric',
            'nama_pemilik' => 'required|string',
            'no_wa' => 'required|numeric',
        ]);
        
        AccountActivation::where('id', $id)
        ->update(
            [
                'biaya_join' => $request->biaya_join,
                'nama_bank' => $request->nama_bank,
                'no_rek' => $request->no_rek,
                'nama_pemilik' => $request->nama_pemilik,
                'no_wa' => $request->no_wa,
            ]
        );

        $request->session()->flash('success', 'Data Join telah berhasil diubah');
        return redirect('masterjoin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
