@extends('layouts.dashboard')

@section('title')
Dashboard Product
@endsection

@section('subtitle')
Dashboard List Product
@endsection

@section('button')
<div class="button">
    <a class="btn btn-primary " href="/dashboard/paket-undangan/create" role="button" >New</a>
</div>
@endsection
@section('content')
<div class="card mr-2 ml-2">
    <h5 class="card-header">Search</h5>
    <form class="card-body" action="/dashboard/paket-undangan" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="@if($key){{ $key }} @else Search for... @endif" name="q">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
        </div>
    </form>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">Bintang</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $index=1;
        @endphp
        @foreach ($pakets as $paket )
        <tr>
            <th scope="row">{{ $index++ }}</th>
            <td>{{ $paket->nama }}</td>
            <td>{{ $paket->harga }}</td>
            <td>
                @for ($i = 0; $i < 5; ++$i)
                    <i class="fa fa-star{{ $paket->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                @endfor
            </td>

            <td><a href="/dashboard/paket-undangan/{{ $paket->id }}" class="btn btn-primary btn-sm">Detail</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>

 <div class="row d-flex justify-content-center">

    {{-- {{ $pakets->links('pagination::bootstrap-4')}} --}}

  </div>
@endsection
