<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use App\Models\Riwayat;
use App\Models\Wo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
        // $paketwos=Wo::orderBy('id','desc')->where('tipe','reguler') ->get();
        // $ketersediaan=Riwayat::orderBy('tgl_acara','asc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->paginate(5);
        Session::flush();

        Auth::logout();
        Alert::warning('Kesalahan','Maaf akun anda telah dinonaktifkan');
        return redirect('/');
        // return view('user/index',compact('paketwos','ketersediaan'));
        // return view('user/pesanan/index', compact('pesanans','totalharga','ketersediaan'));
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
        //
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
        //
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
