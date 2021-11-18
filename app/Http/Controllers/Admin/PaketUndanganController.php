<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PaketUndanganController extends Controller
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

        $pakets = Undangan::query()
            ->where('nama', 'like', "%{$key}%")
            ->orWhere('keterangan_paket', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'dashboard/paket-undangan',
                'keterangan'=>'view dashboard undanganr',
                'detail'=>'-',
            ]);


        // $pakets=Undangan::orderby('id','desc')->get();
        return view('admin.paket-undangan.index', compact('pakets', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-undangan/create',
            'keterangan'=>'view dashboard tambah undangan',
            'detail'=>'-',
        ]);

        return view('admin.paket-undangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|max:50|min:3',
            'lama' => 'required|max:14|numeric',
            'harga' => 'required|numeric|max:0|min:0',
            'bintang' => 'required|max:5|numeric',
            'keterangan' => 'required|max:255|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1023',
            'image2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1023',
            'image3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1023',

        ]);
        $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'),$imgName);

        $imgName2 = $request->image2->getClientOriginalName() . '-' . time() . '.' . $request->image2->extension();
        $request->image2->move(public_path('image'),$imgName2);

        $imgName3 = $request->image3->getClientOriginalName() . '-' . time() . '.' . $request->image3->extension();
        $request->image3->move(public_path('image'),$imgName3);

        Undangan::create([
            'nama' => $request -> nama,
            'keterangan_paket' => "undangan",
            'lama_pengerjaan' => $request -> lama,
            'harga' => $request -> harga,
            'bintang' => $request -> bintang,
            'keterangan' => $request -> keterangan,
            'gambar' => $imgName,
            'gambar2' => $imgName2,
            'gambar3' => $imgName3,
        ]);
        $pakets = Undangan::orderBy('id','desc')->first();
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-undangan/create',
            'keterangan'=>'proses penambahan data undangan '.$pakets->nama,
            'detail'=>'-',
        ]);

        return redirect('/dashboard/paket-undangan');
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
        $paket = Undangan::where('id',$id)->first();

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-undangan/'.$id,
            'keterangan'=>'view detail undangan '.$paket->nama,
            'detail'=>'-',
        ]);

        return view('admin.paket-undangan.detail', compact('paket'));
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
        $paket= Undangan::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-undangan/'.$id.'/edit',
            'keterangan'=>'view edit undangan '.$paket->nama,
            'detail'=>'-',
        ]);
        return view('admin.paket-undangan.edit', compact('paket'));
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
            'nama' => 'required|max:50|min:3',
            'lama' => 'required|max:14|numeric',
            'harga' => 'required|max:0|numeric',
            'bintang' => 'required|max:5|numeric',
            'keterangan' => 'required|max:255|min:3',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
            'image2' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
            'image3' => 'mimes:jpeg,png,jpg,gif,svg|max:1023',
        ]);


        if ($request->image) {
            # code...
            $imgName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'),$imgName);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName = DB::table('undangans')->where('id', $id)->value('gambar');
        }

        if ($request->image2) {
            # code...
            $imgName2 = $request->image2->getClientOriginalName() . '-' . time() . '.' . $request->image2->extension();
            $request->image2->move(public_path('image'),$imgName2);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName2 = DB::table('undangans')->where('id', $id)->value('gambar2');
        }
        if ($request->image3) {
            # code...
            $imgName3 = $request->image3->getClientOriginalName() . '-' . time() . '.' . $request->image3->extension();
            $request->image3->move(public_path('image'),$imgName3);
        } else {
            # code...
            // $imgName=$request->images;
            $imgName3 = DB::table('undangans')->where('id', $id)->value('gambar3');
        }

        Undangan::find($id)->update([
            'nama' => $request -> nama,
            'lama_pengerjaan' => $request -> lama,
            'harga' => $request -> harga,
            'bintang' => $request -> bintang,
            'keterangan' => $request -> keterangan,
            'gambar' => $imgName,
            'gambar2' => $imgName2,
            'gambar3' => $imgName3,
        ]);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/paket-undangan/'.$id.'/edit',
            'keterangan'=>'proses edit undangan ',
            'detail'=>'-',
        ]);
        return redirect('/dashboard/paket-undangan');
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
        Undangan::find($id)->update([
            'deleted_at' => Carbon::now()
        ]);
        // Undangan::find($id)->delete();
        return redirect('/dashboard/paket-undangan');
    }
}
