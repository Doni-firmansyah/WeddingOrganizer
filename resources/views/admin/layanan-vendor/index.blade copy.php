@extends('layouts.dashboard')

@section('title')
Dashboard Product
@endsection

@section('subtitle')
Dashboard List Product
@endsection

@section('button')
{{-- <div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-undangan/create" role="button" >New</a>
</div> --}}
@endsection
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Product</th>
        <th scope="col">Harga</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $index=1;
        @endphp
        @foreach ($vendors as $vendor )
         @if ( $vendor->status=="menunggu")
         <tr class="bg-warning">
        @endif

            <th scope="row">{{ $index++ }}</th>
            <td>{{ $vendor->nama_product }}</td>
            <td>@currency($vendor->harga)</td>
            <td>{{ $vendor->categorys}}</td>
            <td >{{ $vendor->status }}</td>

            <td><a href="/dashboard/layanan-vendor/{{ $vendor->id }}" class="btn btn-primary btn-sm">Detail</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>

 <div class="row d-flex justify-content-center">

    {{-- {{ $vendors->links('pagination::bootstrap-4')}} --}}

  </div>
@endsection
