<?php

namespace App\Http\Controllers;

use App\Models\Transaksidetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class VendortableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transaksidetails = Transaksidetail::select('nama_vendor', DB::raw("COUNT('id') as count"))
                ->groupBy('nama_vendor')
                ->get();

        return view('admin.vendor-tabel.index', compact('transaksidetails'));


        // return view('admin.client-tabel.detail', compact('riwayat','wo'));

    }
    public function cetak()
    {
        //
        $dt     = Carbon::now();
        $transaksidetails = Transaksidetail::select('nama_vendor', DB::raw("COUNT('id') as count"))
                ->groupBy('nama_vendor')
                ->get();

        // return view('admin.vendor-tabel.cetak', compact('transaksidetails','dt'));

        $pdf = PDF::loadView('admin.vendor-tabel.cetak', ['transaksidetails' => $transaksidetails,'dt' => $dt]);
        return $pdf->download('user.pdf');

        // return view('admin.client-tabel.detail', compact('riwayat','wo'));

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
        $transaksidetails = Transaksidetail::where('nama_vendor',$id)->select('product_vendor', DB::raw("COUNT('id') as count"))
                ->groupBy('product_vendor')
                ->get();

        // $pdf = PDF::loadView('admin.vendor-tabel.detail', ['transaksidetails' => $transaksidetails]);
        // return $pdf->download('user.pdf');

        return view('admin.vendor-tabel.detail', compact('transaksidetails'));
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
