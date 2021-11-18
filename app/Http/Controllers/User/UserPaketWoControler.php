<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\Riwayat;
use App\Models\Vendor;
use App\Models\Vendor_Wo;
use App\Models\Wo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaketWoControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexview()
    {
        //

        $paketwos=Wo::orderBy('id','desc')->where('tipe','reguler') ->get();
        $ketersediaan=Riwayat::orderBy('tgl_acara','asc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->paginate(5);
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


        return view('user/index', compact('paketwos','ketersediaan'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paketwos=Wo::orderBy('id','desc')->where('deleted_at',null)->where('tipe','reguler') ->get();
        // dd($paketwos);
        $ketersediaan=Riwayat::orderBy('tgl_acara','asc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->paginate(5);
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
        return view('user/paket-wo', compact('paketwos','ketersediaan'));
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
        $wo= Wo::find($id);
        $details = Vendor_Wo::where('wo_id',$id)->get();
        $vendors=Vendor::orderBy('id')->get();
        // dd($wo);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/paket-wo'.'/'.$id,
            'keterangan'=>'view detail paket wo '.$wo->nama,
            'detail'=>'-',
        ]);

        return view('user/paket-wo-detail', compact('wo','details','vendors'));
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
