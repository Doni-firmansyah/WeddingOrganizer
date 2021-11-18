<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\Pesanan;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class PaketUndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $undangans=Undangan::orderBy('id','desc')->get();

        if (Auth::user()==null) {
            # code...

        }else {
            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'/',
                'keterangan'=>'view home user',
                'detail'=>'-',
            ]);
        }

        return view('user/paket-undangan', compact('undangans'));
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
        $undangans = Riwayat::where('user_id', Auth::user()->id)->where('jumlah_harga', '0')->count();
        $wo = Riwayat::orderBy('id')->where('user_id', Auth::user()->id)->count()-$undangans;

        $undangan= Undangan::find($id);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'paket-undangan/'.$id,
            'keterangan'=>'view detail '.$undangan->nama,
            'detail'=>'-',
        ]);


        return view('user/paket-undangan-detail', compact('undangan','undangans','wo'));



    }
    public function pesan(Request $request, $slug, $id)
    {
        //
        $now = Carbon::now();
        $nows=6;
        $date=$now->addDays($nows);
        // dd($slug);
        $request->validate([
            // 'tglacara' => 'required|max:50|min:3',
            // 'tgl_acara' => 'required|after:'.$date,
            'namapria' => 'required|max:50|min:3',
            // 'ttlpria' => 'required|max:50|min:3',
            'namaayahpria' => 'required|max:50|min:3',
            'namaibupria' => 'required|max:50|min:3',
            'namawanita' => 'required|max:50|min:3',
            'tglacara' => 'required|after:'.$date,
            // 'ttlwanita' => 'required|max:50|min:3',
            'namaayahwanita' => 'required|max:50|min:3',
            'namaibuwanita' => 'required|max:50|min:3',
            'alamatacara' => 'required|max:50|min:3',
            'note' => 'required|max:250|min:3',
        ]);

        $paket= Undangan::find($id);
        Pesanan::create([
            'produk_id' => $id,
            'user_id' => Auth::user()->id,
            'keterangan_paket'=>$slug,
            'status'=>"menunggu",
            'harga'=>"0",
        ]);

        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('harga', '0')->first();
        Riwayat::create([
            'pesanan_id'=> $pesanans->id,
            'user_id' => Auth::user()->id,
            'tgl_acara'=>$request -> tglacara,
            'pesan'=> $request ->note,
            'jumlah_harga'=> "0",
            'status_id'=>"2",
            'status_dp'=> "2",
            'nominal_dp'=> "0",
            'gambar_dp'=> "gratis.jpg",
            'status_pelunasan'=> "2",
            'nominal_pelunasan'=> "0",
            'gambar_pelunasan'=> "gratis.jpg",
            'nama_pria'=>$request ->namapria,
            // 'ttlpria'=>$request ->ttlpria,
            'namaayahpria'=>$request ->namaayahpria,
            'namaibupria'=>$request ->namaibupria,
            'namawanita'=>$request ->namawanita,
            // 'ttlwanita'=>$request ->ttlwanita,
            'namaayahwanita'=>$request ->namaayahwanita,
            'namaibuwanita'=>$request ->namaibuwanita,
            'alamatacara'=>$request ->alamatacara,
            'pesan'=> $request ->note,
        ]);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'paket-undangan/',
            'keterangan'=>'proses pesan undangan',
            'detail'=>'-',
        ]);

        return redirect('/riwayat');
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
