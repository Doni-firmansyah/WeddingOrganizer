@extends('layouts.dashboard')

@section('title')
List Product
@endsection

@section('subtitle')
Dashboard Penambaan product
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-wo" role="button">Back</a>
</div>
@endsection

@section('content')
<form action="/dashboard/paket-wo/{{ $paket ->id }}" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <x-custom-input field="nama" label="Nama Paket" type="text" value="{{ $paket ->nama }}"/>
    {{-- <x-custom-input field="category" label="Category" type="text"  value="{{ $paket ->category }}"/> --}}
    <x-custom-input field="bintang" label="Bintang" type="text"  value="{{ $paket ->bintang }}"/>
    <x-custom-input field="keterangan" label="Keterangan" type="text"  value="{{ $paket ->keterangan }}"/>

    @isset ($paket ->product1)
        <x-custom-input-dropdown-if-edit2 field="wedingorganizer" label="Weding Organizer" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value=" {{ DB::table('vendors')->where('id',  $paket ->product1)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product2)
        <x-custom-input-dropdown-if-edit2 field="gedung" label="Gedung" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product2)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product3)
        <x-custom-input-dropdown-if-edit2 field="katering" label="Katering" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product3)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product4)
        <x-custom-input-dropdown-if-edit2 field="riasan" label="Riasan" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product4)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product5)
        <x-custom-input-dropdown-if-edit2 field="dekor" label="Dekor" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product5)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product6)
        <x-custom-input-dropdown-if-edit2 field="hiburan" label="Hiburan" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product6)->value('nama_product'); }}"/>
    @endisset

    @isset ($paket ->product7)
        <x-custom-input-dropdown-if-edit2 field="lainlain" label="Lain-lain" namatabel="vendors" namacolom="categorys" ambildata="nama_product" value="{{ DB::table('vendors')->where('id',  $paket ->product7)->value('nama_product'); }}"/>
    @endisset
    <x-custom-input-img field="image" label="Choose Image" type="file"  value="{{ $paket ->gambar }}"/>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection









