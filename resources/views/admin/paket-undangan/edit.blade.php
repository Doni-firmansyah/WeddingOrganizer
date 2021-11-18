@extends('layouts.dashboard')

@section('title')
List Product
@endsection

@section('subtitle')
Dashboard Penambaan product
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-undangan" role="button">Back</a>
</div>
@endsection

@section('content')
<form action="/dashboard/paket-undangan/{{ $paket ->id }}" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <x-custom-input field="nama" label="Nama Paket" type="text" value="{{ $paket ->nama }}"/>
    <x-custom-input field="harga" label="Harga" type="text"  value="{{ $paket ->harga }}" />
    <x-custom-input field="lama" label="Maksimal Pengerjaan" type="text"  value="{{ $paket ->lama_pengerjaan}}"/>
    <x-custom-input field="bintang" label="Bintang" type="text"  value="{{ $paket ->bintang }}"/>
    <x-custom-input field="keterangan" label="Keterangan" type="text"  value="{{ $paket ->keterangan }}"/>
    {{-- <x-custom-input-img field="image" label="Choose Image" type="file"  value="{{ $paket ->gambar }}"/> --}}
        <div class="row">
            <div class="col-4">
                <x-custom-input-img field="image" label="Choose Image" type="file" value="{{ $paket ->gambar }}"/>
            </div>
            <div class="col-4">
                <x-custom-input-img-2 field="image2" label="Choose Image" type="file" value="{{ $paket ->gambar2 }}"/>
            </div>
            <div class="col-4">
                <x-custom-input-img-3 field="image3" label="Choose Image" type="file" value="{{ $paket ->gambar3 }}"/>
            </div>
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection




