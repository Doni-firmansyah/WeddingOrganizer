@extends('layouts.vendor')
@section('button')
    <a class="btn btn-danger " href="/vendors" role="button">Kembali</a>
@endsection
@section('content')
<div class="row ">
    <div class="col-md-12">
      <div class="card justify-content-center">
        <div class="card-footer ">
          <div class="legend">
            {{-- <img src="/image/{{ $vendor -> gambar }} "alt="Card image cap" style="width: 100%"> --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  @isset($vendor ->gambar2)<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>@endisset
                  @isset($vendor ->gambar3)<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>@endisset
                  {{-- @isset($vendor ->gambar4)<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>@endisset
                  @isset($vendor ->gambar5)<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>@endisset --}}
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="/image/{{ $vendor -> gambar }}" alt="First slide">
                  </div>
                  @isset($vendor ->gambar2)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar2 }}" alt="Second slide">
                    </div>
                  @endisset
                  @isset($vendor ->gambar3)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar3 }}" alt="Second slide">
                    </div>
                  @endisset
                  {{-- @isset($vendor ->gambar4)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar4 }}" alt="Second slide">
                    </div>
                  @endisset
                  @isset($vendor ->gambar5)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar5 }}" alt="Second slide">
                    </div>
                  @endisset --}}

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
          <hr>
        </div>
    </div>


    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="row border-bottom">
                <div class="col-4">
                    <p>Nama Product</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-7">
                    <p>{{ $vendor -> nama_product }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-4">
                    <p>Harga</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-7">
                    <p>@currency($vendor -> harga)</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-4">
                    <p>Category</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-7">
                    <p>{{ $vendor -> categorys }}</p>
                </div>
            </div>
            <div class="row border-bottom">
                <div class="col-4">
                    <p>Keterangan Layanan / Spesifikasi</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-7">
                    <p>{{ $vendor -> keterangan }}</p>
                </div>
            </div>
        </div>

        {{-- </div> --}}
        <div class="d-grid gap-2 col-6 mx-auto m-4">
            <a class="genric-btn success circle arrow" href="/vendor/{{$vendor->id}}/edit" role="button">Edit</a>
            <form action="/vendor/{{ $vendor->id }}" method="post" style="float: right">
                @csrf
                @method('DELETE')
               <button class="genric-btn danger circle arrow">Hapus</button>
            </form>
        </div>


      </div>
    </div>
  </div>
@endsection
