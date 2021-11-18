@extends('layouts.user')
@section('index')
    @include('user.component.header')
    @include('user.component.slider')
        <section class="pricing-card-area section-padding30 section-bg" data-background="/wedding/assets/img/gallery/section_bg1.png">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-70">
                            <h2>Pemilihan Hiburan</h2>
                            <div class="mt-4">
                                <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                                <p>Silakan pilih Hiburan Anda, Bila anda kurang berminat harap lanjut ke step selanjutnya</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tracking --}}
                <x-progress field="{{ $wo->id }}"/>
                {{-- tracking --}}


                <div class="row align-items-end">
                    @foreach ($products as $paketwo )
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-card text-center mb-30

                        @if ($wo->product6==$paketwo->id)
                        active
                    @endif
                    ">
                            <div class="card-top">
                                <div class="filtr-item col-sm-12">
                                    <img src="/image/{{$paketwo->gambar}}" class="img-fluid mb-2" alt="white sample" style="width:640px;height:360px"/>
                                </div>
                                <h4 class="mt-3">{{$paketwo->nama_product}}</h4>
                                <p>By. {{ DB::table('users')->where('id', $paketwo->user_id)->value('nama_vendor'); }}</p>
                            </div>
                            {{-- <div class="card-bottom">
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i>Rp. {{$paketwo->harga}}</li>
                                    <li>{{$paketwo->keterangan}}</li>
                                </ul>
                            </div> --}}
                            <div class="card-buttons mt-30">
                                {{-- <a href="/custom/create-step-6/{{$paketwo->id}}" class="genric-btn danger circle arrow">Pilih</a> --}}
                                <a class="genric-btn info circle arrow" href="#" role="button"  data-toggle="modal" data-target="#modal-default-{{$paketwo->id}}">Detail</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-buttons text-center">
                    <a href="/custom/create-step-7/{{$wo->id}}" class="btn card-btn1">Menu Selanjutnya</a>
                </div>
            </div>
            {{-- modal --}}
                @foreach ($products as $paketwo )
                <div class="modal fade mt-5" id="modal-default-{{$paketwo->id}}">
                    <div class="modal-dialog mt-5">
                    <div class="modal-content mt-5">
                        <div class="modal-header">
                        <h4 class="modal-title">{{$paketwo->nama_product}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        {{-- <p>One fine body&hellip;</p> --}}
                        {{-- <div class="card-header ">
                            <h4 class="card-title text-uppercase">{{$paketwo->nama_product}}</h4>

                        </div> --}}
                        {{-- slider --}}
                        <div class="slider">
                            <div id="carouselExampleIndicators{{$paketwo->id}}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators{{$paketwo->id}}" data-slide-to="0" class="active"></li>
                                @isset($paketwo ->gambar2)<li data-target="#carouselExampleIndicators{{$paketwo->id}}" data-slide-to="1"></li>@endisset
                                @isset($paketwo ->gambar3)<li data-target="#carouselExampleIndicators{{$paketwo->id}}" data-slide-to="2"></li>@endisset
                                @isset($paketwo ->gambar4)<li data-target="#carouselExampleIndicators{{$paketwo->id}}" data-slide-to="3"></li>@endisset
                                @isset($paketwo ->gambar5)<li data-target="#carouselExampleIndicators{{$paketwo->id}}" data-slide-to="4"></li>@endisset
                                </ol>
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/image/{{ $paketwo -> gambar }}" alt="First slide">
                                </div>
                                @isset($paketwo ->gambar2)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/image/{{ $paketwo -> gambar2 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($paketwo ->gambar3)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/image/{{ $paketwo -> gambar3 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($paketwo ->gambar4)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/image/{{ $paketwo -> gambar4 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($paketwo ->gambar5)
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="/image/{{ $paketwo -> gambar5 }}" alt="Second slide">
                                    </div>
                                @endisset

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{$paketwo->id}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{$paketwo->id}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        {{-- /slider --}}
                        <div class="card-body mt-3">
                            <div class="row row border-bottom">
                                <div class="col-4">
                                <p>Product By</p>
                                </div>
                                <div class="col-1">
                                    <p> :</p>
                                </div>
                                <div class="col-7">
                                    <p>{{ DB::table('users')->where('id', $paketwo->user_id)->value('nama_vendor')}}</p>
                                </div>
                            </div>
                            <div class="row row border-bottom">
                                <div class="col-4">
                                <p>Instagram</p>
                                </div>
                                <div class="col-1">
                                    <p> :</p>
                                </div>
                                <div class="col-7">
                                    <p>{{ DB::table('users')->where('id', $paketwo->user_id)->value('instagram_vendor');}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-3">
                            <div class="row row border-bottom">
                                <div class="col-4">
                                <p> Nama Product</p>
                                </div>
                                <div class="col-1">
                                    <p> :</p>
                                </div>
                                <div class="col-7">
                                    <p>{{ $paketwo ->nama_product }}</p>
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
                                    <p> {{ $paketwo ->categorys }}</p>
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
                                    <p> @currency($paketwo ->harga)</p>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-4">
                                    <p> Keterangan</p>
                                </div>
                                <div class="col-1">
                                    <p>:</p>
                                </div>
                                <div class="col-7">
                                    <p>{{ $paketwo ->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <p>One fine body&hellip;</p> --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button" class="genric-btn danger circle arrow" data-dismiss="modal">Close</button>
                        <a href="/custom/create-step-6/{{$paketwo->id}}/{{$wo->id}}" class="genric-btn info circle arrow">Pilih</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                @endforeach
            <!-- /.modal -->
        </section>
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
 @endsection
