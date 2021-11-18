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
use Illuminate\Support\Facades\DB;
Use RealRashid\SweetAlert\Facades\Alert;

class UserCustomControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customs= Wo::orderBy('id','desc')->where('tipe','custom')->where('user_id',Auth::user()->id)->get();
        $ketersediaan=Riwayat::orderBy('tgl_acara','asc')->where('status_id', '2')->where('jumlah_harga', '>', 3)->paginate(5);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'paket-custom',
            'keterangan'=>'view paket wo detail',
            'detail'=>'-',
        ]);
        return view('/user/paket-custom', compact('customs','ketersediaan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // step ctrate 2
     public function nama($idwo)
     {
         //
         $data=Vendor_Wo::where('wo_id',$idwo)->get();
         $wo = WO::find($idwo);

         return view('/user/service/custom/create-nama', compact('wo','data'));
     }

     public function namas(Request $request, $idwo)
     {
        $request->validate([
            'nama' => 'required|max:50|min:3',
            'keterangan' => 'required|max:250|min:3'
        ]);

        $wos = WO::find($idwo);
                                    $p1=DB::table('vendors')->where('id', $wos->product1)->value('harga');
                                    $p2=DB::table('vendors')->where('id', $wos->product2)->value('harga');
                                    $p3=DB::table('vendors')->where('id', $wos->product3)->value('harga');
                                    $p4=DB::table('vendors')->where('id', $wos->product4)->value('harga');
                                    $p5=DB::table('vendors')->where('id', $wos->product5)->value('harga');
                                    $p6=DB::table('vendors')->where('id', $wos->product6)->value('harga');
                                    $p7=DB::table('vendors')->where('id', $wos->product7)->value('harga');
                                    $total=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
        WO::find($idwo)->update([
            'nama' =>$request->nama,
            'tipe' => "custom",
            'harga' => $total,
            'keterangan' =>$request->keterangan,
        ]);

        if ($wos->product1) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product1,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product2) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product2,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product3) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product3,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product4) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product4,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product5) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product5,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product6) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product6,
                'wo_id' => $idwo,
            ]);
        }
        if ($wos->product7) {
            Vendor_Wo::create([
                'vendor_id' =>  $wos->product7,
                'wo_id' => $idwo,
            ]);
        }
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'paket-custom/create',
            'keterangan'=>'proses buat paket wo',
            'detail'=>'-',
        ]);
        alert('Paket '.$request->nama,' Paket Berhasil Ditambahkan', 'success');
        return redirect('/paket-custom');

     }

     public function namaawal()
    {
        WO::create([
            'nama' =>  "paket-custom".Auth::user()->name,
            'tipe' => "belum",
            'harga' =>"0",
            'gambar' =>"0",
            'user_id' => Auth::user()->id,
            'bintang' => "5",
            'keterangan_paket' =>"wo",
            'keterangan' =>"Paket Custom By-".Auth::user()->name,
        ]);
        return redirect('paket-custom/create');
    }

    public function create()
    {
        //
        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','1')->where('status','Diterima')->get();
        $wo=Wo::orderby('id','desc')->where('user_id',Auth::user()->id)
                                    ->where('tipe','belum')
                                    ->first();
                                    // dd($wo);
        return view('/user/paket-custom-create', compact('products','wo'));
    }

    public function creates($id,$idwo)
    {
        $wos = WO::find($idwo);
        $products= Vendor::find($id);
        WO::find($idwo)->update([
            'gambar' => $products->gambar,
            'harga'=>$wos->harga + $products->harga,
            'product1' =>$products->id,
        ]);

        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-2/'.$idwo);
    }
    // step ctrate 2
    public function step2($idwo)
    {
        //
        $wo=WO::find($idwo);

        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','2')->where('status','Diterima')->get();
        return view('user/service/custom/create2', compact('products','wo'));
    }

    public function steps2($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);

        WO::find($idwo)->update([
            'product2' =>$products->id,
            'harga'=>$wos->harga + $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-3/'.$idwo);
    }

    // step ctrate 3
    public function step3($idwo)
    {
        //
        $wo = WO::find($idwo);


        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','3')->where('status','Diterima')->get();
        return view('user/service/custom/create3', compact('products','wo'));
    }

    public function steps3($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);
        WO::find($idwo)->update([
            'product3' =>$products->id,
            'harga'=>$wos->harga+ $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-4/'.$idwo);
    }
    // step ctrate 4
    public function step4($idwo)
    {
        //
        $wo = WO::find($idwo);

        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','4')->where('status','Diterima')->get();
        return view('user/service/custom/create4', compact('products','wo'));
    }

    public function steps4($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);
        WO::find($idwo)->update([
            'product4' =>$products->id,
            'harga'=>$wos->harga+ $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-5/'.$idwo);
    }

    // step 5
    public function step5($idwo)
    {
        //
        $wo = WO::find($idwo);
        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','5')->where('status','Diterima')->get();
        return view('user/service/custom/create5', compact('products','wo'));
    }

    public function steps5($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);
        WO::find($idwo)->update([
            'product5' =>$products->id,
            'harga'=>$wos->harga+ $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-6/'.$idwo);
    }

    // step 6
    public function step6($idwo)
    {
        //
        $wo = WO::find($idwo);
        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','6')->where('status','Diterima')->get();

        return view('user/service/custom/create6', compact('products','wo'));
    }

    public function steps6($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);
        WO::find($idwo)->update([
            'product6' =>$products->id,
            'harga'=>$wos->harga+ $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-step-7/'.$idwo);
    }
    // step 7
    public function step7($idwo)
    {
        //
        $wo = WO::find($idwo);
        $products=Vendor::orderby('id','desc')->where('deleted_at',null)->where('category_id','7')->where('status','Diterima')->get();
        return view('user/service/custom/create7', compact('products','wo'));
    }

    public function steps7($id,$idwo)
    {
        $products= Vendor::find($id);
        $wos = WO::find($idwo);
        WO::find($idwo)->update([
            'product7' =>$products->id,
            'harga'=>$wos->harga+ $products->harga,

        ]);
        toast($products->nama_product.' Berhasil Ditambahkan!','success');
        return redirect('custom/create-nama/'.$idwo);
    }
    public function slugedit($slug, $idwo, $id)
    {
        //
        $wo=WO::find($idwo);
        // dd( $wo);
        $products= Vendor::find($id);

        if ($slug=='product1') {
            WO::find($idwo)->update([
                'product1' =>"",
            ]);
        } elseif ($slug=='product2') {
            WO::find($idwo)->update([
                'product2' =>"",
            ]);
        } elseif ($slug=='product3') {
            WO::find($idwo)->update([
                'product3' =>"",
            ]);
        } elseif ($slug=='product4') {
            WO::find($idwo)->update([
                'product4' =>"",
            ]);
        }
        elseif ($slug=='product5') {
            WO::find($idwo)->update([
                'product5' =>"",
            ]);
        }elseif ($slug=='product6') {
            WO::find($idwo)->update([
                'product6' =>"",
            ]);
        }elseif ($slug=='product7') {
            WO::find($idwo)->update([
                'product7' =>"",
            ]);
        }

        return redirect('custom/create-nama/'.$idwo);
    }



    /**steps2
     *  Vendor::find($id)->update([
            'status' => $request -> status,
        ]);
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
        WO::find($id)->delete();
        return redirect('/dashboard/paket-wo');
    }
}
