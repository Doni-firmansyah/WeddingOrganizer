<?php

namespace App\Http\Controllers;

use App\Models\Logativitas;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\Style;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // protected function redirectTo()
    // {
    //   if (Auth::user()->role == 'admin')
    //   {
    //     return 'admin';  // admin dashboard path
    //   } else {
    //     return 'home';  // member dashboard path
    //   }
    // }

    public function index(Request $request)
    {
        //
        // $user = General::query()->firstOrFail();
        $key = trim($request->get('q'));

        $users = User::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('email', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

            Logativitas::create([
                'user_id'=>Auth::user()->id,
                'nama_route'=>'dashboard/user',
                'keterangan'=>'view dashboard user',
                'detail'=>'-',
            ]);
        // $users = User::OrderBy('id','desc')->paginate(10);
        return view('admin.user.index', compact('users','key'));
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
        $user = User::where('id',$id)->first();
        // dd( $user);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/user/id',
            'keterangan'=>'view detail user '.$user->name,
            'detail'=>'-',
        ]);
        return view('admin.user.detail', compact('user'));
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
        $user= User::find($id);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/user/'.$id.'/edit',
            'keterangan'=>'view edit user '.$user->name,
            'detail'=>'-',
        ]);
        return view('admin.user.edit', compact('user'));

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
        $user= User::find($id);
        $request->validate([
            'role' => 'required',
        ]);


        User::find($id)->update([
            'role' => $request -> role,
        ]);

        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/user/'.$id.'/edit',
            'keterangan'=>'proses update role '.$user->name .'menjadi '. $request -> role,
            'detail'=>'-',
        ]);

        Alert::success('Selamat Perubahan Data user Berhasil', '');
        // alert('Perubahan Berhasil','Selamat Perubahan Data user Berhasil.', 'success');
        return redirect('/dashboard/user');
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
        $user= User::find($id);
        Logativitas::create([
            'user_id'=>Auth::user()->id,
            'nama_route'=>'dashboard/user/'.$id.'/hapus',
            'keterangan'=>'proses update hapus akun'.$user->name,
            'detail'=>'-',
        ]);

        // User::find($id)->delete();
        User::find($id)->update([
            'role' => "deleted"
        ]);
        Alert::warning('Data user Berhasil Dihapus', '');
        return redirect('/dashboard/user');
    }

}

