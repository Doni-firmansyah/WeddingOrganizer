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
<form action="/dashboard/user/{{ $user ->id }}" method="POST" enctype="multipart/form-data">
    @csrf @method('put')
      <x-custom-input-dropdown-status field="role" label="Role" value="{{ $user ->role }}" namatabel="roles" namacolom="role"/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection









