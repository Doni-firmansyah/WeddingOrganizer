<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VendorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        $user= User::find($id);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/user'.'/'.$id,
            'keterangan'=>'user detail '.$user->name,
            'detail'=>'-',
        ]);

        return view('user.user-detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/user'.'/'.$id.'/edit',
            'keterangan'=>'edit user  '.$user->name,
            'detail'=>'-',
        ]);
        return view('user.user-edit', compact('user'));
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
        //'required|max:50|min:3|unique:vendors,nama_product',
        $request->validate([
            'nama' => 'required|max:50|min:3',
            'alamat' => 'required|max:250|min:3',
            'email' => 'required|max:50|min:3',
            'handphone' => 'required|min:3|numeric',
            'nama_vendor' => 'max:50|min:3',
            'alamat_usaha' => 'max:250|min:3',
            'email_vendor' => 'max:50|min:3',
            'telp_vendor' => 'min:3|numeric',
        ]);
        // dd($category);

        User::find($id)->update([
            'name' => $request -> nama,
            'alamat' => $request -> alamat,
            'role' => "vendor",
            'email' => $request -> email,
            'handphone' => $request -> handphone,
            'nama_vendor' => $request -> nama_vendor,
            'alamat_usaha' => $request -> alamat_usaha,
            'email_vendor' => $request -> email_vendor,
            'telp_vendor' => $request -> telp_vendor,
        ]);
        $user= User::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'/user'.'/'.$id.'/edit',
            'keterangan'=>'proses edit user  '.$user->name,
            'detail'=>'-',
        ]);

        toast('Selamat, Data Anda Berhasil diperbarui!','success');
        return redirect('/');
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


    public function daftar($id)
    {
        $user= User::find($id);
        return view('user.daftar-layanan-vendor', compact('user'));
    }

    public function daftarstore(Request $request, $id)
    {
        //
        $request->validate([
            'nama_vendor' => 'required|max:50|min:3',
            'email_vendor' => 'required|max:50|min:3',
            'instagram_vendor' => 'required|max:50|min:3',
            'alamat_usaha' => 'required|max:250|min:3',
        ]);
        // dd($category);

        User::find($id)->update([
            'nama_vendor' => $request -> nama_vendor,
            'role' => "vendor",
            'email_vendor' => $request -> email_vendor,
            'instagram_vendor' => $request -> instagram_vendor,
            'alamat_usaha' => $request -> alamat_usaha,
            'telp_vendor' => $request -> telp_vendor,

        ]);
        toast('Selamat, Pendaftaran Vendor Anda Sudah Selesai!','success');
        return redirect('/');
    }

}
