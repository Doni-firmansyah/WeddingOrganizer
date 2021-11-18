<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Logativitas;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class LayananVendorController extends Controller
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
        $vendors = Vendor::query()

            ->where('nama_product', 'like', "%{$key}%")
            ->orWhere('categorys', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        // $vendors=Vendor::orderby('id','desc')->get();
        $vendorsmenunggu=Vendor::orderby('id','desc')->where('deleted_at',null)->where('status','Menunggu')->get();
        $vendorsditerima=Vendor::orderby('id','desc')->where('deleted_at',null)->where('status','Diterima')->get();
        $vendorstidak=Vendor::orderby('id','desc')->where('deleted_at',null)->where('status','Tidak')->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/layanan-vendor',
            'keterangan'=>'view dashboard layanan-vendor',
            'detail'=>'-',
        ]);

        return view('admin.layanan-vendor.index', compact('vendors','vendorsmenunggu','vendorsditerima','vendorstidak','key'));
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

        $vendor = Vendor::where('id',$id)->first();
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/layanan-vendor/'.$id,
            'keterangan'=>'view detail layanan-vendor'.$vendor->nama_product,
            'detail'=>'-',
        ]);

        return view('admin.layanan-vendor.detail', compact('vendor'));
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
        $vendor= Vendor::find($id);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/layanan-vendor/'.$id.'/edit',
            'keterangan'=>'view edit layanan-vendor'.$vendor->nama_product,
            'detail'=>'-',
        ]);

        return view('admin.layanan-vendor.edit', compact('vendor'));
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
        // $category = Category::where('nama_category', $request -> status)->first();
        $request->validate([
            'status' => 'required|max:50|min:3',
        ]);
        // dd($request -> status);
        Vendor::find($id)->update([
            'status' => $request -> status,
            // 'id' => $category->id
        ]);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/layanan-vendor/'.$id,
            'keterangan'=>'proses edit layanan-vendor ',
            'detail'=>'-',
        ]);
        Alert::success('Proses Perubahan Data Berhasil', '');
        return redirect('/dashboard/layanan-vendor');
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

        Alert::success('Proses Delete Berhasil', '');
        return redirect('/dashboard/layanan-vendor');
    }
}
