
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
            <form action="/user/daftar/layanan/vendor/{{ $user ->id }}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')
                <x-custom-input field="nama_vendor" label="Nama Vendor" type="text"/>
                <x-custom-input field="email_vendor" label="Email Vendor" type="text" />
                <x-custom-input field="instagram_vendor" label="Instagram vendor" type="text"  />
                <x-custom-input field="alamat_usaha" label="Alamat Usaha" type="text"/>
                <x-custom-input field="telp_vendor" label="Telp Vendor" type="text"/>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        {{-- </div> --}}
      </div>
    </div>
  </div>

@endsection
