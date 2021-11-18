<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\Pesanan;
use App\Models\Riwayat;
use App\Models\Transaksi;
use App\Models\Vendor;
use App\Models\Wo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //All
        // $alldata=Riwayat::orderby('id','desc')->get();
        $key = trim($request->get('q'));
        $alldata = Riwayat::query()
            ->where('nama_pemesan', 'like', "%{$key}%")
            ->orWhere('tgl_acara', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        //tidak
        $pesananstidak=Riwayat::orderby('id','desc')->where('status_id','4') ->get();
        //selesai
        $pesanansselesai=Riwayat::orderby('id','desc')->where('status_id','3') ->get();
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
            'nama_route'=>'dashboard/pesanan',
            'keterangan'=>'view dashboard pesanan',
            'detail'=>'-',
        ]);


        return view('admin.pesanan.index', compact('wo','key','pesanans','pesanansproses','date','alldata','pesanansselesai','pesananstidak','vendors'));
    }

    public function proses()
    {
        //
        $now = Carbon::now();
        $nows=10;
        $date=$now->addDays($nows);

        $pesanans=Riwayat::orderby('id','desc')->where('status_id','2') ->get();
        return view('admin.pesanan.proses', compact('pesanans','date'));
    }
    public function selesai()
    {
        //
        $pesanans=Riwayat::orderby('id','desc')->where('status_id','3','4') ->get();
        return view('admin.pesanan.selesai', compact('pesanans'));
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
        $request->validate([
            'nominal_dp' => 'required|numeric',
            'status' => 'required',
            'status_dp' => 'required',
        ]);
        // dd($request -> status_dp);
        if ( $request -> status=="Diterima") {
            # code...
            Riwayat::find($id)->update([
                'status_id' => DB::table('statuses')->where('pesanan_admin', $request -> status)->value('id'),
                'nominal_dp' =>$request ->nominal_dp,
                'status_dp' =>DB::table('statuses')->where('pembayaran_admin', $request -> status_dp)->value('id'),
            ]);


            if (DB::table('transaksis')->where('riwayat_id',$id)->value('wo_id')==null) {
                // $pesanan=DB::table('pesanan_riwayat')->where('riwayats_id',$id)->value('pesanans_id');
                $pesanans=Pesanan::find($id);
                $datariwayat=Riwayat::find($id);
                $datawo=Wo::find($pesanans->produk_id);

                Transaksi::create([
                    'riwayat_id' => $id,
                    'tgl_acara' => $datariwayat->tgl_acara,
                    'nama_pemesan' => $datariwayat->nama_pemesan,
                    'nama_product' => $datawo->nama,
                    'wo_id' => $pesanans->produk_id,
                ]);
            }

        } else {
            # code...
            Riwayat::find($id)->update([
                'status_id' => DB::table('statuses')->where('pesanan_admin', $request -> status)->value('id'),
                // 'status_dp' =>DB::table('statuses')->where('pembayaran_admin', $request -> status_dp)->value('id'),
            ]);
        }

        $riwayat=Riwayat::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/dashboard/pesanan/'.$id,
            'keterangan'=>'proses edit pesanan '.$riwayat->nama_pemesan.'update dp '.$request ->nominal_dp ,
            'detail'=>'-',
        ]);

        Alert::success('Selamat Data Pesanan Berhasil Diubah', '');
        return redirect('/dashboard/pesanan');
    }
    public function update2(Request $request, $id)
    {
        //
        $request->validate([
            'nominal_pelunasan' => 'required|numeric',
            'status' => 'required',
            'status_pelunasan' => 'required',
        ]);

            Riwayat::find($id)->update([
                'status_id' => DB::table('statuses')->where('pesanan_admin', $request -> status)->value('id'),
                'nominal_pelunasan' =>$request ->nominal_pelunasan,
                'status_pelunasan' =>DB::table('statuses')->where('pembayaran_admin', $request -> status_pelunasan)->value('id'),
            ]);

            $riwayat=Riwayat::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/dashboard/pesanan/'.$id,
            'keterangan'=>'proses edit pelunasan '.$riwayat->nama_pemesan.'update dp '.$request ->nominal_pelunasan ,
            'detail'=>'-',
        ]);

        Alert::success('Selamat Data Pesanan Berhasil Diubah', '');
        return redirect('/dashboard/pesanan');
    }
    public function update3(Request $request, $id)
    {
        //
        $request->validate([
            'status' => 'required',
        ]);

            Riwayat::find($id)->update([
                'status_id' => DB::table('statuses')->where('pesanan_admin', $request -> status)->value('id'),
             ]);
        Alert::success('Selamat Data Pesanan Berhasil Diubah', '');
        return redirect('/dashboard/pesanan');
    }
    public function update4(Request $request, $id)
    {
        //
        $request->validate([
            'status' => 'required',
        ]);

            Riwayat::find($id)->update([
                'status_id' => DB::table('statuses')->where('pesanan_admin', $request -> status)->value('id'),
             ]);
        Alert::success('Selamat Data Pesanan Berhasil Diubah', '');
        return redirect('/dashboard/pesanan');
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
