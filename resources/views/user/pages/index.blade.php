@extends('layouts.user-detail')

{{-- @section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="vendor" role="button">Back</a>
</div>
@endsection --}}
@section('title')
    Daftar Detail User
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title text-uppercase">{{ $user->name }}</h4>
        </div>

        <div class="card-footer ">
          <div class="legend">
            <img src="/image/user/user.jpg"alt="Card image cap" style="width: 100%">
          </div>
        <hr>
        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        {{-- <div class="card-body"> --}}
            <div class="card-header ">
                <h4 class="card-title text-uppercase">User</h4>
            </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <td scope="col">Nama</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Email</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Alamat</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user->alamat }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Nomer Handphone</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $user->handphone}}</td>
                  </tr>
              </table>

              {{-- Vendor --}}
              @if (DB::table('users')->where('id', Auth::user()->id)->value('nama_vendor')=="")

              @else
                    <div class="card-header ">
                        <h4 class="card-title text-uppercase">Vendor</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td scope="col">Nama Vendor</td>
                            <td scope="col">:</td>
                            <td scope="col">{{ $user->nama_vendor }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Instagram Vendor</td>
                            <td scope="col">:</td>
                            <td scope="col">{{ $user->instagram_vendor }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Alamat Vendor</td>
                            <td scope="col">:</td>
                            <td scope="col">{{ $user->alamat_usaha }}</td>
                        </tr>
                        <tr>
                            <td scope="col">Telp Vendor</td>
                            <td scope="col">:</td>
                            <td scope="col">{{ $user->telp_vendor}}</td>
                        </tr>
                    </table>
                {{-- </div> --}}


              @endif

              <div class="d-grid gap-2 col-6 mx-auto m-4">
                <div class="row justify-content-center">
                <a class="genric-btn success circle arrow " href="/user/detail/{{ $user->id}}/edit" role="button">Edit</a>
            </div>
            </div>


      </div>
    </div>
  </div>

@endsection
