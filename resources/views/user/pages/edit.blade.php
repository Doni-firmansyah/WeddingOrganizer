@extends('layouts.user-detail')

@section('title')
    Daftar Detail User
@endsection

@section('button')
<div class="button">
    <a href="/user/detail/{{ $user->id }}" class="btn btn-primary " href="vendor" role="button">Back</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-header ">
          <h4 class="card-title text-uppercase">{{ $user->name }}</h4>
          <hr>
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
            <div class="card-body ">

            <form action="/user/detail/{{ $user ->id }}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="card-header ">
                    <h4 class="card-title text-uppercase">Data User</h4>
                </div>
                <div class="card-body ">
                    <x-custom-input field="nama" label="Nama" type="text" value="{{ $user ->name }}"/>
                    <x-custom-input field="alamat" label="Alamat" type="text"  value="{{ $user ->alamat }}"/>
                    <x-custom-input field="email" label="Emai" type="text"  value="{{ $user ->email }}"/>
                    <x-custom-input field="handphone" label="No Handphone" type="text"  value="{{ $user ->handphone }}"/>
                </div>

                @if ($user ->nama_vendor )
                    <div class="card-header pt-4">
                        <h4 class="card-title text-uppercase">Data Vendor</h4>
                    </div>
                    <div class="card-body ">
                        <x-custom-input field="nama_vendor" label="Nama Vendor" type="text" value="{{ $user ->nama_vendor }}"/>
                        <x-custom-input field="alamat_usaha" label="Alamat Vendor" type="text"  value="{{ $user ->alamat_usaha }}"/>
                        <x-custom-input field="email_vendor" label="Emai Vendor" type="text"  value="{{ $user ->email_vendor }}"/>
                        <x-custom-input field="telp_vendor" label="Telp Vendor" type="text"  value="{{ $user ->telp_vendor }}"/>
                    </div>
                @else

                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        {{-- </div> --}}
      </div>
    </div>
  </div>

@endsection
