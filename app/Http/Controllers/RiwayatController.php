<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use App\Models\Pesanan;
use App\Models\Pesananjadi;

use App\Models\Riwayat;
use App\Models\Vendor;
use App\Models\Wo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $now = Carbon::now();
        $nows=10;
        $date=$now->addDays($nows);

        $riwayats=Riwayat::orderBy('id','desc')->where('user_id',Auth::user()->id)->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'riwayat',
            'keterangan'=>'view riwayat',
            'detail'=>'-',
        ]);

        return view('user/pesanan/history', compact('riwayats','date'));


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
    public function store(Request $request , $id)
    {
        //
        $now = Carbon::now();
        $nows=6;
        $date=$now->addDays($nows);



        $pesanan =Pesanan::find($id);
        $wo =Wo::find($pesanan->produk_id);
        if ($wo->product2==null) {
            $request->validate([
                'cek' => 'required|max:50',
                'pesan' => 'required|max:250',
                'alamatacara' => 'required|max:250',
                'tgl_acara' => 'required|unique:transaksis,tgl_acara|after:'.$date,
            ]);
            $alamatacara=$request->alamatacara;

        }else {
            $request->validate([
                'cek' => 'required|max:50',
                'pesan' => 'required|max:250',
                'alamatacara' => 'nullable|max:250',
                'tgl_acara' => 'required|unique:transaksis,tgl_acara|after:'.$date,
            ]);
            $vendor =Vendor::find($wo->product2);
            $alamatacara= $vendor->nama_product;
        }


        Riwayat::create([

            'pesanan_id' =>$id,
            'user_id' =>Auth::user()->id,
            'nama_pemesan'=>Auth::user()->name,
            'tgl_acara'=> $request->tgl_acara,
            'alamatacara' => $alamatacara,
            'pesan' => $request->pesan,
            'jumlah_harga'=>$pesanan->harga,
            'status_id'=>"1",
        ]);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/pesanan',
            'keterangan'=>'proses pesan',
            'detail'=>'-',
        ]);

            Pesanan::find($id)->update([
                'status' => "2",
            ]);



        alert('Check Out Berhasil','Selamat Pesanan anda berhasil diproses, Selanjutnya lanjut pembayaran', 'success');
        return redirect('/riwayat');
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
        if ($request->image) {
            # code...
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'),$imgName);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName = DB::table('riwayats')->where('id', $id)->value('gambar_dp');
        }

        //proses put
        if (DB::table('riwayats')->where('id', $id)->value('status_dp')=='2') {
            # code...
            Riwayat::find($id)->update([
                // 'gambar_dp' => $imgName,
                'gambar_pelunasan' => $imgName,
                'status_pelunasan' => "1",
            ]);
        } else {
            # code...
            Riwayat::find($id)->update([
                'gambar_dp' => $imgName,
                // 'gambar_pelunasan' => $imgName2,
                'status_dp' => "1",
            ]);
        }



        // Riwayat::find($id)->update([
        //     'gambar_dp' => $imgName,
        //     'gambar_pelunasan' => $imgName2,
        //     'status_dp' => "1",
        // ]);
        Alert::info('Upload Bukti Pembayaran Berhasil', 'Selamat anda berhasil melalukan upload bukti pembayaran, selanjutnya menunggu verifikasi admin');
        return redirect('/riwayat');
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
