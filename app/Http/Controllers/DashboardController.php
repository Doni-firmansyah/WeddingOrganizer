<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{



    public function redirect()
    {
        if (Auth::user()->role == 'admin')
        {
            return view('admin.dashboard.index'); // admin dashboard path
        }elseif (Auth::user()->role == 'Ceo') {
            return view('admin.dashboard.index');
        }elseif (Auth::user()->role == 'Finance') {
            return view('admin.dashboard.index');
        }elseif (Auth::user()->role == 'Clientmanagent') {
            return view('admin.dashboard.index');
        }elseif (Auth::user()->role == 'Vendormanagent') {
            return view('admin.dashboard.index');
        }elseif (Auth::user()->role == 'deleted') {
            return redirect('/delete');
        }

        else {
            return redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::orderby('number', 'FR 900')->first();
        return view('admin.dashboard.index');
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
    public function perform()
    {

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'logout',
            'keterangan'=>'logout',
            'detail'=>'-',
        ]);

        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
