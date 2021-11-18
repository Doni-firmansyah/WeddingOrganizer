<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logativitas;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // Undangan::find($id)->update([
        //     'nama' => $request -> nama,
        //     'lama_pengerjaan' => $request -> lama
        // ]);
        // $logs=Logativitas::orderby('id','desc')->paginate('25');
        // return view('admin.log',compact('logs'));
        if ($request -> nama ==null && $request -> tanggal ==null) {
            $nama=null;
            $tanggal=null;
            $logs=Logativitas::orderBy('id','desc')->paginate('25');
            return view('admin.log',compact('logs','nama','tanggal'));
        }elseif ($request -> nama !==null && $request -> tanggal !==null) {
            # code...
            $tanggal=$request -> tanggal;
            $nama=$request -> nama;
            $user=User::where('name',$request -> nama)->first();
            $logs=Logativitas::orderBy('id','desc')->where('user_id',$user->id)->where('created_at','like', "%{$request -> tanggal}%")->paginate('25');
            return view('admin.log',compact('logs','nama','tanggal'));
        }elseif ($request -> nama !==null) {
            $tanggal=null;
            $nama=$request -> nama;
            $user=User::where('name',$request -> nama)->first();
            $logs=Logativitas::orderBy('id','desc')->where('user_id',$user->id)->paginate('25');
            return view('admin.log',compact('logs','nama','tanggal'));
        }elseif ($request -> tanggal !==null) {
            $tanggal=$request -> tanggal;
            $nama=null;
            $logs=Logativitas::orderBy('id','desc')->where('created_at','like', "%{$request -> tanggal}%")->paginate('25');
            return view('admin.log',compact('logs','nama','tanggal'));
        }else {
            # code...
            $tanggal=$request -> tanggal;
            $nama=$request -> nama;
            $user=User::where('name',$request -> nama)->first();
            $logs=Logativitas::orderBy('id','desc')->where('user_id',$user->id)->where('created_at','like', "%{$request -> tanggal}%")->paginate('25');
        }



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
