@extends('layouts.dashboard')

@section('title')
List Product
@endsection

@section('subtitle')
Dashboard Penambaan product undangan
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="dashboard/paket-undangan" role="button">Back</a>
</div>
@endsection

@section('content')
<form action="/dashboard/paket-undangan" method="POST" enctype="multipart/form-data">
    @csrf
    <x-custom-input field="nama" label="Nama Paket" type="text"/>
    {{-- <x-custom-input field="banyak" label="Banyaknya Undangan" type="text"/>
    <x-custom-input field="lama" label="Lama Penayangan " type="text" /> --}}
    {{-- <x-custom-input field="harga" label="Harga" type="text" /> --}}
    <x-custom-input field="bintang" label="Bintang" type="text"/>
    <x-custom-input field="keterangan" label="Keterangan" type="text" />
    <x-custom-input-img field="image" label="Choose Image" type="file" />
    {{-- <x-custom-image/> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection




