<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Logativitas;
use App\Models\Vendor;
use App\Models\Vendor_Wo;
use Illuminate\Http\Request;
use App\Models\WO;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

class PaketWoController extends Controller
{
    protected function redirectTo()
    {
        if (Auth::user()->role == 'admin')
        {
          return 'admin';  // admin dashboard path
        } else {
          return 'home';  // member dashboard path
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $key = trim($request->get('q'));

        $pakets = WO::query()
            ->where('nama', 'like', "%{$key}%")
            ->where('tipe', 'reguler')
            ->where('deleted_at',null)
            ->orWhere('keterangan_paket', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

            $paketcustom = WO::orderBy('id','desc')->where('deleted_at',null)->where('tipe','custom')->get();
            $paketfeel = WO::orderBy('id','desc')->where('deleted_at',null)->where('tipe','reguler')->get();

            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'dashboard/paket-wo',
                'keterangan'=>'view dashboard paket wo',
                'detail'=>'-',
            ]);

        // $pakets=WO::orderby('id','desc')->where('tipe','reguler') ->get();
        return view('admin.paket-wo.index', compact('pakets','paketcustom','paketfeel','key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Category::orderBy('id','desc')->get();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-wo/create',
            'keterangan'=>'view penambahan paket wo',
            'detail'=>'-',
        ]);

        return view('admin.paket-wo.create', compact('products'));
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
            'nama' => 'required|max:25|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1023',
            'harga' => 'min:3|numeric',
            'bintang' => 'required|max:5|numeric',

            'keterangan' => 'required|max:255|min:3',
            'wedingorganizer' => 'required|max:255',
            'gedung' => 'max:255',
            'katering' => 'max:255',
            'riasan' => 'max:255',
            'dekor' => 'max:255',
            'hiburan' => 'max:255',
            'lainlain' => 'max:255',
        ]);
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'),$imgName);

        $hargatotal=    DB::table('vendors')->where('nama_product', $request -> wedingorganizer)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> gedung)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> katering)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> riasan)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> dekor)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> hiburan)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> lainlain)->value('harga');
            ///Vendor::where('nama_product', $request -> wedingorganizer)->value('id')->first()
        WO::create([
            'nama' => $request -> nama,
            'keterangan_paket' => "wo",
            'tipe' => "reguler",
            'gambar' => $imgName,
            'harga' => $hargatotal,
            'user_id' => Auth::user()->id,
            'bintang' => $request -> bintang,
            'keterangan' => $request -> keterangan,
            'product1' => DB::table('vendors')->where('nama_product', $request -> wedingorganizer)->value('id'),
            'product2' => DB::table('vendors')->where('nama_product', $request -> gedung)->value('id'),
            'product3' => DB::table('vendors')->where('nama_product', $request -> katering)->value('id'),
            'product4' => DB::table('vendors')->where('nama_product', $request -> riasan)->value('id'),
            'product5' => DB::table('vendors')->where('nama_product', $request -> dekor)->value('id'),
            'product6' => DB::table('vendors')->where('nama_product', $request -> hiburan)->value('id'),
            'product7' => DB::table('vendors')->where('nama_product', $request -> lainlain)->value('id'),
        ]);

        $categories=["wedingorganizer",
                        "gedung",
                        "katering",
                        "riasan",
                        "dekor",
                        "hiburan",
                        "lainlain"];

        $wos = WO::orderBy('id','desc')->first();
        foreach ($categories as $key ) {
            if ($request -> $key) {
                Vendor_Wo::create([
                    'vendor_id' =>DB::table('vendors')->where('nama_product', $request -> $key)->value('id'),
                    'wo_id' => $wos->id,
                ]);
            }
        }

        $wo = WO::orderBy('id','desc')->first();
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-wo/create',
            'keterangan'=>'proses penambahan paket wo '.$wo->nama,
            'detail'=>'-',
        ]);

        Alert::success('Selamat Data Paket WO Berhasil Dibuat', '');
        return redirect('/dashboard/paket-wo');
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
        $paket = WO::where('id',$id)->first();
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-wo/'.$id,
            'keterangan'=>'proses penambahan paket wo '.$paket->nama,
            'detail'=>'-',
        ]);
        return view('admin.paket-wo.detail', compact('paket'));
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
        $paket= WO::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-wo/'.$id,
            'keterangan'=>'proses penambahan paket wo '.$paket->nama,
            'detail'=>'-',
        ]);
        return view('admin.paket-wo.edit', compact('paket'));
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
            'nama' => 'required|max:25|min:3',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
            // 'harga' => 'required|min:3|numeric',
            'keterangan' => 'required|max:255|min:3',
            // 'category' => 'required',
            'bintang' => 'required|max:5|numeric',
        ]);


        if ($request->image) {
            # code...
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'),$imgName);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName = DB::table('wos')->where('id', $id)->value('gambar');
        }
        $hargatotal=    DB::table('vendors')->where('nama_product', $request -> wedingorganizer)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> gedung)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> katering)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> riasan)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> dekor)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> hiburan)->value('harga')+
                        DB::table('vendors')->where('nama_product', $request -> lainlain)->value('harga');

                        // dd( $request -> gedung);
        WO::find($id)->update([
                'nama' => $request -> nama,
                'gambar' => $imgName,
                'harga' => $hargatotal,
                'keterangan' => $request -> keterangan,
                // 'category' => $request -> category,
                'bintang' => $request -> bintang,
                'product1' => DB::table('vendors')->where('nama_product',  $request -> wedingorganizer)->value('id'),
                'product2' => DB::table('vendors')->where('nama_product',  $request -> gedung)->value('id'),
                'product3' => DB::table('vendors')->where('nama_product',  $request -> katering)->value('id'),
                'product4' => DB::table('vendors')->where('nama_product',  $request -> riasan)->value('id'),
                'product5' => DB::table('vendors')->where('nama_product',  $request -> dekor)->value('id'),
                'product6' => DB::table('vendors')->where('nama_product',  $request -> hiburan)->value('id'),
                'product7' => DB::table('vendors')->where('nama_product',  $request -> lainlain)->value('id'),
        ]);


        Vendor_Wo::where('wo_id',$id) ->delete();

        $wos =WO::find($id);
        $categories=["wedingorganizer",
                        "gedung",
                        "katering",
                        "riasan",
                        "dekor",
                        "hiburan",
                        "lainlain"];

        // $wos = WO::orderBy('id','desc')->first();
        foreach ($categories as $key ) {
            if ($request -> $key) {
                Vendor_Wo::create([
                    'vendor_id' =>DB::table('vendors')->where('nama_product', $request -> $key)->value('id'),
                    'wo_id' => $wos->id,
                ]);
            }
        }

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-wo/'.$id,
            'keterangan'=>'proses penambahan paket wo '.$wos->nama,
            'detail'=>'-',
        ]);



        Alert::success('Selamat Data Paket WO Berhasil Diedit', '');
        return redirect('/dashboard/paket-wo');
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
        // WO::find($id)->delete();
        WO::find($id)->update([
            'deleted_at' => Carbon::now()
        ]);

        Alert::warning('Selamat Data Paket WO Berhasil Dihapus', '');
        return redirect('/dashboard/paket-wo');
    }
}
