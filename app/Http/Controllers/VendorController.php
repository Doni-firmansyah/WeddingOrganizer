<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use App\Models\Riwayat;
use App\Models\Transaksi;
use App\Models\Transaksidetail;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use PDF;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        //
        $transaksis=Transaksidetail::orderBy('id','desc')->where('user_id',Auth::user()->id)->paginate(5);
        $transaksisproses=Transaksidetail::orderBy('id','desc')->where('user_id',Auth::user()->id)->where('tgl_acara', '>=', $now)->paginate(5);
        $transaksisselesai=Transaksidetail::orderBy('id','desc')->where('user_id',Auth::user()->id)->where('tgl_acara', '<', $now)->paginate(5);
        $vendors=Vendor::orderBy('id','desc')->where('deleted_at',null)->where('user_id',Auth::user()->id)->paginate(5);

        // dd(Auth::user()->id);
        return view('vendor.index' , compact('vendors','transaksis','transaksisproses','transaksisselesai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.create');
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
        $request->validate([
            'nama_product' => 'required|max:50|min:3|unique:vendors,nama_product',
            'category' => 'required|max:50',
            'harga' => 'required|min:100|numeric',
            'keterangan' => 'required|max:255|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2023',
            'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2023',
            'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2023',
            // 'image4' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
            // 'image5' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',

        ]);
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'),$imgName);

        $imgName2 = $request->image2->getClientOriginalName() . '-' . time() . '.' . $request->image2->extension();
        $request->image2->move(public_path('image'),$imgName2);

        $imgName3 = $request->image3->getClientOriginalName() . '-' . time() . '.' . $request->image3->extension();
        $request->image3->move(public_path('image'),$imgName3);

        // $imgName4 = $request->image4->getClientOriginalName() . '-' . time() . '.' . $request->image4->extension();
        // $request->image4->move(public_path('image'),$imgName4);

        // $imgName5 = $request->image5->getClientOriginalName() . '-' . time() . '.' . $request->image5->extension();
        // $request->image5->move(public_path('image'),$imgName5);

        $category = DB::table('categories')->where('nama_category', $request -> category)->value('id');
        Vendor::create([
            'nama_product' => $request -> nama_product,
            'category_id' => $category,
            'categorys' => $request -> category,
            'user_id' => Auth::user()->id,
            'harga' => $request -> harga,
            'keterangan' => $request -> keterangan,
            'status' => "Menunggu",
            'gambar' => $imgName,
            'gambar2' => $imgName2,
            'gambar3' => $imgName3,
            // 'gambar4' => $imgName4,
            // 'gambar5' => $imgName5,
        ]);
        toast('Layanan vendor anda Berhasil dibuat!','success');
        return redirect('/vendors');
    }

    /**Auth::user()->name
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $vendor= Vendor::find($id);
        return view('vendor.detail', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor= Vendor::find($id);
        return view('vendor.edit', compact('vendor'));

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
        // //
        $request->validate([
            'nama_product' => 'required|max:50|min:3',
            'category' => 'required|max:50',
            'harga' => 'required|min:100|numeric',
            'keterangan' => 'required|max:255|min:3',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',

        ]);


        if ($request->image) {
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'),$imgName);
        } else {
            $imgName = DB::table('vendors')->where('id', $id)->value('gambar');
        }

        if ($request->image2) {
            $imgName2 = $request->image2->getClientOriginalName() . '-' . time() . '.' . $request->image2->extension();
            $request->image2->move(public_path('image'),$imgName2);
        } else {
            $imgName2 = DB::table('vendors')->where('id', $id)->value('gambar2');
        }
        if ($request->image3) {
            $imgName3 = $request->image3->getClientOriginalName() . '-' . time() . '.' . $request->image3->extension();
            $request->image3->move(public_path('image'),$imgName3);
        } else {
            $imgName3 = DB::table('vendors')->where('id', $id)->value('gambar3');
        }
        if ($request->image4) {
            $imgName4 = $request->image4->getClientOriginalName() . '-' . time() . '.' . $request->image4->extension();
            $request->image4->move(public_path('image'),$imgName4);
        } else {
            $imgName4 = DB::table('vendors')->where('id', $id)->value('gambar4');
        }
        if ($request->image5) {
            $imgName5 = $request->image5->getClientOriginalName() . '-' . time() . '.' . $request->image5->extension();
            $request->image5->move(public_path('image'),$imgName5);
        } else {
            $imgName5 = DB::table('vendors')->where('id', $id)->value('gambar5');
        }

        $category = DB::table('categories')->where('nama_category', $request -> category)->value('id');
        // dd($category);

        Vendor::find($id)->update([
            'nama_product' => $request -> nama_product,
            'category_id' => $category,
            'harga' => $request -> harga,
            'categorys' => $request -> category,
            'keterangan' => $request -> keterangan,
            'status' => "Menunggu",
            'gambar' => $imgName,
            'gambar2' => $imgName2,
            'gambar3' => $imgName3,
            'gambar4' => $imgName4,
            'gambar5' => $imgName5,
        ]);
        toast('Layanan vendor anda Berhasil di Edit!','success');
        return redirect('/vendors');
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
        Vendor::find($id)->update([
            'deleted_at' => Carbon::now()
        ]);

        toast('Layanan vendor anda Berhasil di Hapus!','warning');
        return redirect('/vendors');
    }
    public function cetak($id)
    {
        //
        $transaksi=Transaksidetail::find($id);


        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/vendors/cetak/{id}',
            'keterangan'=>'cetak transaksi '.Auth::user()->nama_vendor,
            'detail'=>'-',
        ]);
        //
        // return view('admin.client-tabel.vedor', compact('transaksi'));
        $pdf = PDF::loadView('admin.client-tabel.vedor', ['transaksi' => $transaksi]);
        return $pdf->download('user.pdf');


    }
}
