<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\Pesanan;
use App\Models\Riwayat;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Transaksidetail;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
// use Barryvdh\DomPDF\PDF;

use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $key = trim($request->get('q'));
        $transaksis = Transaksi::query()
            ->where('nama_product', 'like', "%{$key}%")
            ->orWhere('nama_pemesan', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/dashboard/transaksi',
            'keterangan'=>'halaman dashboard transaksi',
            'detail'=>'-',
        ]);

        // $transaksis=Transaksi::orderBy('id','Desc')->get();
        return view('admin.transaksi.index' , compact('transaksis','key'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finance(Request $request)
    {
        //
        $key = trim($request->get('q'));
        $transaksis = Transaksi::query()
            ->where('nama_product', 'like', "%{$key}%")
            ->orWhere('nama_pemesan', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/finance',
            'keterangan'=>'halaman dashboard finance tabel',
            'detail'=>'-',
        ]);

        return view('admin.transaksi.finance' , compact('transaksis','key'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proses($id)
    {
        //
        $transaksi=Transaksi::find($id);
        $riwayat=Riwayat::find($transaksi->riwayat_id);


        if ($transaksi->wo->product1 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product1);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product1,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product2 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product2);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product2,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product3 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product3);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product3,
                'user_id' =>$vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product4 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product4);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product4,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product5 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product5);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product5,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product6 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product6);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product6,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        if ($transaksi->wo->product7 > 0) {
            $vedorid=Vendor::find($transaksi->wo->product7);
            $userid=User::find($vedorid->user_id);
            Transaksidetail::create([
                // 'wo_id' => $transaksi->wo_id,
                // 'riwayat_id'=>$transaksi->wo->id,
                'tgl_acara' => $transaksi->tgl_acara,
                'transaksi_id' => $id,
                'vendor_id' =>$transaksi->wo->product7,
                'user_id' => $vedorid->user_id,
                'nama_vendor' => $userid->nama_vendor,
                'product_vendor' => $vedorid->nama_product,
                'nama_pemesan' => $transaksi->riwayat->nama_pemesan,
                'lokasi' => $transaksi->riwayat->alamatacara,
            ]);
        }
        Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'dashboard/transaksi/proses/'.$id,
                'keterangan'=>'memproses transaksi '. $transaksi->nama_pemesan,
                'detail'=>'-',
        ]);

        Alert::success('Selamat  Perubahan Proses Berhasil', '');
        return back();
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
        $transaksis=Transaksi::find($id);
        $transaksidetails=Transaksidetail::where('transaksi_id',$id)->get();

        Logativitas::create([
                        'user_id'=>Auth::user()->id,
                        'nama_route'=>'dashboard/transaksi'.$id,
                        'keterangan'=>'view halaman detail transaksi'. $transaksis->nama_pemesan,
                        'detail'=>'-',
                    ]);
        return view('admin.transaksi.detail' , compact('transaksis','transaksidetails'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {
        //
        $transaksis=Transaksi::find($id);
        $transaksidetails=Transaksidetail::where('transaksi_id',$id)->get();


        Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'dashboard/finance/'.$id,
                'keterangan'=>'view detail transaksi'. $transaksis->nama_pemesan,
                'detail'=>'-',
            ]);
        return view('admin.transaksi.financepdf' , compact('transaksis','transaksidetails'));
        // $pdf = PDF::loadView('admin.transaksi.financepdf', ['transaksis' => $transaksis,'transaksidetails' => $transaksidetails]);
        // return $pdf->download('user.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export($id)
    {
        //
        $dt     = Carbon::now();
        $transaksis=Transaksi::find($id);
        $transaksidetails=Transaksidetail::where('transaksi_id',$id)->get();
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/finance/'.$id,
            'keterangan'=>'exxport laporan '. $transaksis->nama_pemesan,
            'detail'=>'-',
        ]);
        // return view('admin.transaksi.export' , compact('transaksis','transaksidetails'));
        $pdf = PDF::loadView('admin.transaksi.export', ['transaksis' => $transaksis,'transaksidetails' => $transaksidetails,'dt' => $dt]);
        return $pdf->download('user.pdf');
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
    public function update(Request $request, $id , $trid)
    {
        //
        $request->validate([
            'nominal_dp' => 'numeric|nullable',
            'pesan' => 'max:1023|nullable',
            'nominal_pelunasan' => 'numeric|nullable',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
            'image2' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
        ]);
        if ($request->image) {
            # code...
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'),$imgName);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName = DB::table('transaksidetails')->where('id', $id)->value('bukti_dp');
        }
        if ($request->image2) {
            # code...
            $imgName2 = $request->image2->getClientOriginalName() . '-' . time() . '.' . $request->image2->extension();
            $request->image2->move(public_path('image'),$imgName2);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName2 = DB::table('transaksidetails')->where('id', $id)->value('bukti_pelunasan');
        }

        Transaksidetail::find($id)->update([
            'status_dp' => $request -> status_dp,
            'pesan' => $request -> pesan,
            'nominal_dp' => $request -> nominal_dp,
            'status_pelunasan' => $request -> status_pelunasan,
            'nominal_pelunasan' => $request -> nominal_pelunasan,
            'bukti_dp' => $imgName,
            'bukti_pelunasan' => $imgName2,
        ]);

            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'/dashboard/transaksi/edit',
                'keterangan'=>'update penambahan DP='.$request -> nominal_dp.'penambahan pelunasan='.$request -> nominal_pelunasan,
                'detail'=>'-',
            ]);

        Alert::success('Selamat Perubahan data  Berhasil diproses ', '');
        return redirect('/dashboard/transaksi/'.$trid);

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
