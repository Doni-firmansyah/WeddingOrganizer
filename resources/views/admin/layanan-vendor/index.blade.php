@extends('layouts.dashboard')

@section('title')
Dashboard Product
@endsection

{{-- @section('subtitle')
Dashboard List Product
@endsection --}}

@section('button')
{{-- <div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-undangan/create" role="button" >New</a>
</div> --}}
@endsection
@section('content')
<!-- /.col -->
<div class="card mb-2 mr-2 ml-2">
    <h5 class="card-header">Search</h5>
    <form class="card-body" action="/dashboard/layanan-vendor" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="@if($key){{ $key }} @else Search for... @endif" name="q">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
        </div>
    </form>
</div>

<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2" style="background-color: rgb(92, 86, 97)">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#gambar1" data-toggle="tab">All</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar2" data-toggle="tab">Diterima</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar3" data-toggle="tab">Menunggu</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar4" data-toggle="tab">Tidak Diterima</a></li>
          {{-- <li class="nav-item"><a class="nav-link" href="#gambar5" data-toggle="tab">Gambar 5</a></li> --}}
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="gambar1">
                <!-- Post -->
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
                            @if ( $vendor->status=="Menunggu" )
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
                <!-- /.post -->
          </div>

          <div class="tab-pane" id="gambar2">
                <!-- Post -->
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
                            @foreach ($vendorsditerima as $vendor )
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
                <!-- /.post -->
          </div>


          <div class="tab-pane" id="gambar3">
                <!-- Post -->
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
                            @foreach ($vendorsmenunggu as $vendor )
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
                <!-- /.post -->
          </div>

          <div class="tab-pane" id="gambar4">
                <!-- Post -->
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
                            @foreach ($vendorstidak as $vendor )
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
                <!-- /.post -->
          </div>

          {{-- <div class="tab-pane" id="gambar5"> --}}
            {{-- content --}}
            {{-- gambar 3 --}}
            {{-- content --}}
          {{-- </div> --}}

        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>


@endsection
