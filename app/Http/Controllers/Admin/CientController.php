<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Riwayat;
use App\Models\Transaksi;
use App\Models\Vendor;
use App\Models\Wo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
// use Barryvdh\DomPDF\PDF;
use PDF;

class CientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         //All
        // $alldata=Riwayat::orderby('id','desc')->get();
        $key = trim($request->get('q'));
        $alldata = Riwayat::query()
            ->where('nama_pemesan', 'like', "%{$key}%")
            ->where('jumlah_harga','>',0)
            ->orWhere('tgl_acara', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        //tidak
        $pesananstidak=Riwayat::orderby('id','desc')->where('jumlah_harga','>',0)->where('status_id','4') ->get();
        //selesai
        $pesanansselesai=Riwayat::orderby('id','desc')->where('jumlah_harga','>',0)->where('status_id','3') ->get();
        //diproses
        $now = Carbon::now();
        $nows=10;
        $date=$now->addDays($nows);
        $pesanansproses=Riwayat::orderby('id','desc')->where('status_id','2') ->get();

        $pesanans=Riwayat::orderby('id','desc')->where('status_id','1',null)->get();
        $vendors=Vendor::orderby('id','desc')->get();
        $wo=Wo::orderby('id','desc')->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/client-tabel',
            'keterangan'=>'view dashboard Client Tabel',
            'detail'=>'-',
        ]);


        return view('admin.client-tabel.index', compact('wo','key','pesanans','pesanansproses','date','alldata','pesanansselesai','pesananstidak','vendors'));
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
        $riwayat= Riwayat::find($id);
        $wo= Wo::find($riwayat->pesanan->produk_id);
        $dt     = Carbon::now();


        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/client-tabel/'.$id,
            'keterangan'=>'cetak transaksi '.$riwayat->nama_pemesan,
            'detail'=>'-',
        ]);
        //
        $pdf = PDF::loadView('admin.client-tabel.detail', ['riwayat' => $riwayat,'wo' => $wo,'dt' => $dt]);
        return $pdf->download('user.pdf');

        // return view('admin.client-tabel.detail', compact('riwayat','wo'));
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
