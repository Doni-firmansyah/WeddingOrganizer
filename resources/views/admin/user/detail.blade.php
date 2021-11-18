@extends('layouts.dashboard')

@section('title')
Detail User
@endsection

@section('subtitle')
Dashboard Detail User
@endsection

@section('button')
<div class="button">
    <a class="btn btn-primary " href="/dashboard/user" role="button" style="float: right">Back</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card ">

        <div class="card-footer ">
          <div class="legend">
            <img src="/image/user/user.JPG "alt="Card image cap" style="width: 100%">
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        {{-- <div class="card-body"> --}}
            <div class="card-header ">
                <h4 class="card-title text-uppercase">{{ $user -> name }}</h4>
              </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <td scope="col">Nama User</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user -> name }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Email</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user -> email  }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Alamat</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user -> alamat }}</td>
                  </tr>
                  <tr>
                    <td scope="col">No Hp</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user ->handphone }} </td>
                  </tr>
                  <tr>
                    <td scope="col">Password</td>
                    <td scope="col">:</td>
                    <td scope="col"> * * * * * * * * *</td>
                  </tr>
                </thead>
              </table>
        {{-- </div> --}}
        @if ( Auth::user()->role=="Ceo" )
            <div class="d-grid gap-2 col-6 mx-auto m-4">
                <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-primary"> Edit</a>
                <form action="/dashboard/user/{{ $user->id }}" method="post" style="float: right">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-small btn-danger btn-center ">Hapus</button>
                </form>
            </div>
        @endif
      </div>
    </div>
  </div>

@endsection




