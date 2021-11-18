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
<form action="/dashboard/pesanan/{{ $paket ->id }}" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <x-custom-input field="nama" label="Nama Paket" type="text" value="{{ $paket ->nama }}"/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection




