@extends('layouts.dashboard')

@section('title')
List Product
@endsection

@section('subtitle')
Dashboard Penambaan product
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/product" role="button">Back</a>
</div>
@endsection

@section('content')
<form action="/dashboard/paket-wo" method="POST" enctype="multipart/form-data">
    @csrf
    <x-custom-input field="nama" label="Nama Paket" type="text"/>
    {{-- <x-custom-input field="harga" label="Harga" type="text" /> --}}
    <x-custom-input field="bintang" label="Bintang" type="text"/>
    <x-custom-input field="keterangan" label="Keterangan" type="text" />
    <x-custom-input-dropdown-if-wo field="wedingorganizer" label="Weding Organizer" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="gedung" label="Gedung" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="katering" label="Katering" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="riasan" label="Riasan" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="dekor" label="Dekor" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="hiburan" label="Hiburan" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-dropdown-if-wo field="lainlain" label="Lain-lain" namatabel="vendors" namacolom="categorys" ambildata="nama_product"/>
    <x-custom-input-img field="image" label="Choose Image" type="file" />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection




