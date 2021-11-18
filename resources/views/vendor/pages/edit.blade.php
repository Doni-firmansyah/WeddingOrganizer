@extends('layouts.vendor2')

@section('title')
    <div class="button m-4">
        <h2>Layanan Vendor</h2>
    </div>
@endsection
@section('button')
    <div class="button m-4">
        <a class="btn btn-primary " href="/vendor/{{ $vendor ->id }}" role="button">Back</a>
    </div>
@endsection

@section('content')
<div class="content border p-5" style="background: white">
    <form action="/vendor/{{ $vendor ->id }}" method="POST" enctype="multipart/form-data">
        @csrf @method('put')
        <x-custom-input field="nama_product" label="Nama Product" type="text" value="{{ $vendor ->nama_product }}"/>
        {{-- <x-custom-input field="category" label="Category" type="text" value="{{ $vendor->category->nama_category }}"/> --}}
        {{-- <x-custom-input-dropdown-status field="category" label="Category" value="{{ $vendor->category->nama_category  }}" namatabel="categories" namacolom="nama_category"/> --}}
        <x-custom-input-dropdown-status field="category" label="Category" value="{{ $vendor->categorys}}" namatabel="categories" namacolom="nama_category"/>

        <x-custom-input field="harga" label="Harga" type="text" value="{{ $vendor ->harga }}"/>
        <x-custom-input field="keterangan" label="Keterangan Layanan / Spesifikasi" type="text" value="{{ $vendor ->keterangan }}"/>
        {{-- <x-custom-input-img field="image" label="Choose Image" type="file" value="{{ $vendor ->gambar }}" /> --}}
            <div class="row">
                <div class="col-4">
                    <x-custom-input-img field="image" label="Gambar 1" type="file" value="{{ $vendor ->gambar }}"/>
                </div>
                <div class="col-4">
                    <x-custom-input-img-2 field="image2" label="Gambar 2" type="file" value="{{ $vendor ->gambar2 }}"/>
                </div>
                <div class="col-4">
                    <x-custom-input-img-3 field="image3" label="Gambar 3" type="file" value="{{ $vendor ->gambar3 }}"/>
                </div>
            </div>
        <div class="button mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection




