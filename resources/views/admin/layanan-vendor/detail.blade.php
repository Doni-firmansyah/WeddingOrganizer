@extends('layouts.dashboard')

@section('title')
Detail Product
@endsection

@section('subtitle')
Dashboard Penambaan product
@endsection

@section('button')
<div class="button">
    <a class="btn btn-primary " href="/product" role="button">Back</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
      <div class="card ">
        {{-- <div class="card-header ">
          <h4 class="card-title text-uppercase">{{ $vendor -> nama }}</h4>
          <hr>
        </div> --}}

        <div class="card-footer ">
            <div class="legend">
                {{-- <img src="/image/{{ $vendor -> gambar }} "alt="Card image cap" style="width: 100%"> --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar }} " alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar2 }} " alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar3 }} " alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
          {{-- <hr> --}}
          {{-- <div class="stats">
            @for ($i = 0; $i < 5; ++$i)
                    <i class="fa fa-star{{ $vendor->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                @endfor
          </div> --}}

        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        {{-- <div class="card-body"> --}}
            <div class="card-header ">
                <h4 class="card-title text-uppercase">Detail Layanan vendor</h4>
                <hr>
              </div>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <td scope="col">Nama paket</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $vendor ->nama_product }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Harga</td>
                    <td scope="col">:</td>
                    <td scope="col">@currency($vendor ->harga)</td>
                  </tr>
                  <tr>
                    <td scope="col">Banyaknya Undangan</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $vendor ->categorys }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Status</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $vendor ->status }}</td>
                  </tr>
                  <tr>
                    <td scope="col">Keterangan Layanan / Spesifikasi</td>
                    <td scope="col">:</td>
                    <td scope="col">{{ $vendor -> keterangan }}</td>
                  </tr>
                  @if ($vendor->deleted_at !== null)
                    <tr>
                        <td scope="col">Status</td>
                        <td scope="col">:</td>
                        <td scope="col">Deleted</td>
                    </tr>
                  @endif
                </thead>
              </table>
        {{-- </div> --}}
        @if (Auth::user()->role == 'Vendormanagent' && $vendor->deleted_at== null)
            <div class="d-grid gap-2 col-6 mx-auto m-4">
                <a class="btn btn-primary btn-center " href="/dashboard/layanan-vendor/{{$vendor->id}}/edit" role="button">Edit</a>
                <form action="/dashboard/layanan-vendor/{{ $vendor->id }}" method="post" style="float: right">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-small btn-danger btn-center ">Hapus</button>
                </form>
            </div>
        @endif
      </div>
    </div>
  </div>

@endsection




