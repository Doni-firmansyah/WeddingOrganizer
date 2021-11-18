<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use App\Models\Pesanan;
use App\Models\Pesananjadi;
use App\Models\PesananRiwayat;
use App\Models\Riwayat;
use App\Models\Undangan;
use App\Models\Wo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PesananRiwayatTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesanans=Pesanan::orderBy('id','desc')->where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        $totalharga = Pesanan::where('user_id', Auth::user()->id)->where('status','belum')->sum('harga');
        $ketersediaan=Riwayat::orderBy('tgl_acara','asc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->paginate(5);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/pesanan',
            'keterangan'=>'view pesanan',
            'detail'=>'-',
        ]);

        return view('user/pesanan/index', compact('pesanans','totalharga','ketersediaan'));
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
    public function cek (Request $request)
    {
        $request->validate([
            'cek' => 'max:50|date',
        ]);

        $now = Carbon::now();
        $nows=7;
        $date=$now->addDays($nows);

        $pesanans=Riwayat::orderBy('id','desc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->where('tgl_acara', $request->cek)->count();
        // dd($pesanans);
        if ($pesanans>0) {
            # code...
            Alert::warning('Tersedia','Layanan Feelight untuk '.Carbon::parse($request->cek)->format('d-M-Y').' Tidak Tersedia');

        }elseif ($request->cek<$date) {
            # code...
            Alert::warning('Tersedia','Layanan Feelight untuk '.Carbon::parse($request->cek)->format('d-M-Y').' Tidak Tersedia');
        }else {
            # code...
            Alert::success('Tersedia','Layanan Feelight untuk '.Carbon::parse($request->cek)->format('d-M-Y').' Tersedia');
        }

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/cek-ketersediaan',
            'keterangan'=>'view cek ketersediaan',
            'detail'=>'-',
        ]);

        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$slug,$id)
    {



        if ($slug=="wo") {
            $paket = Wo::find($id);
        } else {
            $paket = Undangan::find($id);
        }
            # code...
            Pesanan::create([
                'produk_id' => $id,
                'user_id' =>  Auth::user()->id,
                'keterangan_paket' => $slug,
                'status' => "belum",
                'harga' => $paket -> harga,
            ]);

            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'/proses',
                'keterangan'=>'proses pesanan',
                'detail'=>'-',
            ]);




        Alert::success($paket->nama, $paket->nama.'Berhasil Ditambahkan dipesanan');
        return redirect('/pesanan');
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
        Pesanan::find($id)->delete();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/pesanan/delete',
            'keterangan'=>'delete pesanan',
            'detail'=>'-',
        ]);

        Alert::warning('Selamat', ' Pesanan Berhasil Dihapus');
        return redirect('/pesanan');
    }
}
