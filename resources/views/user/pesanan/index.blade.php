@extends('layouts.user')
@section('index')
    @include('user.component.header')
        <section class="pricing-card-area section-padding10 section-bg pt-5" data-background="/wedding/assets/img/gallery/section_bg1.png">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-70">
                            <h2>Pesanan Anda</h2>
                            <div class="mt-4">
                                <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                                <div class="card-header ">
                                    <h4 class="card-title text-uppercase">Detail Pesanan</h4>
                                </div>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Product</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Hapus</th>
                                          </tr>
                                        </thead>
                                        @php
                                            $no=1;
                                        @endphp
                                       @foreach ( $pesanans as $pesanan )
                                            <tbody>
                                                <tr>
                                                <td scope="col">{{ $no++ }}</td>
                                                <td scope="col">@if ($pesanan->keterangan_paket=="wo" )
                                                    {{ DB::table('wos')->where('id', $pesanan->produk_id)->value('nama'); }}
                                                @else
                                                    {{ DB::table('undangans')->where('id', $pesanan->produk_id)->value('nama'); }}
                                                @endif</td>
                                                <td scope="col">Paket-{{ $pesanan->keterangan_paket }}</td>
                                                <td scope="col">@currency($pesanan->harga)</td>
                                                <td scope="col">
                                                    <a href="#" class="btn genric-btn info circle arrow small" data-target=".bd-example-modal-lg-{{$pesanan->id}}" data-toggle="modal">Bayar / Hapus</a>
                                                    {{-- <a href="#" class="btn genric-btn info circle arrow small" data-target="#modal-default-1" data-toggle="modal">Bayar</a> --}}
                                                    {{-- <form action="/pesan/{{ $pesanan->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                       <button class=" btn genric-btn danger circle arrow small">Hapus-<i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form> --}}
                                                </td>
                                                </tr>
                                            </tbody>
                                       @endforeach
                                       {{-- <thead>
                                          <tr>
                                            <th colspan="2"></th>
                                            <th >Total</th>
                                            <th>@currency($totalharga)</th>
                                            <th>
                                                <a href="#" class="btn genric-btn info circle arrow small" data-target=".bd-example-modal-lg" data-toggle="modal">Bayar</a>
                                            </th>
                                          </tr>
                                        </thead> --}}
                                      </table>
                            </div>
                        </div>
                        {{-- calender --}}
                            <div class="card-header text-center">
                                <h4 class="card-title text-uppercase">Jadwal Kegiatan Feelight.ID</h4>
                            </div>
                              <nav class="navbar navbar-light bg-light col-lg-12">
                                <form class="form-inline bg-light col-lg-12" action="/ketersediaan/cek" method="get" enctype="multipart/form-data">
                                    @csrf
                                  <input class="form-control mr-sm-2 col-lg-9" type="date" format="dd/mm/yyyy" name="cek" value="{{ old("cek") }}">

                                  <button class="genric-btn danger circle arrow" type="submit">Cek Jadwal</button>
                                </form>
                              </nav>
                            <div class="row pl-3 pr-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $ketersediaan as $cek)
                                            <tr>
                                                <th>{{ \Carbon\Carbon::parse($cek->tgl_acara)->format('d-M-Y') }}</th>
                                                <th style="color: red">Jadwal Penuh</th>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                {{$ketersediaan->links("pagination::bootstrap-4")}}
                            </div >
                        {{-- calender --}}
                    </div>
                </div>
            </div>
            {{-- modal Detail / hapus --}}
            @foreach ( $pesanans as $pesanan )
                @php
                    $wo = DB::table('wos')->where('id', $pesanan->produk_id )->first();
                @endphp
                <div class="modal fade bd-example-modal-lg-{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Check Out</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                {{-- <div class="m-3"> --}}
                                    <div class="col-5">
                                        <img class="d-block w-100 img-thumbnail" src="/image/{{ $wo -> gambar }}" alt="Second slide">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body mt-1">
                                            <div class="row row border-bottom">
                                                <div class="col-4">
                                                <p>Nama Paket</p>
                                                </div>
                                                <div class="col-1">
                                                    <p> :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p>{{ $wo->nama }}</p>
                                                </div>
                                            </div>
                                            <div class="row row border-bottom">
                                                <div class="col-4">
                                                    <p>Perancang Paket</p>
                                                </div>
                                                <div class="col-1">
                                                    <p> :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p>@if ( $wo->user_id == Auth::user()->id )
                                                        {{ Auth::user()->name }}
                                                    @else
                                                        Feelight.ID
                                                    @endif</p>
                                                </div>
                                            </div>
                                            <div class="row row border-bottom">
                                                <div class="col-4">
                                                    <p>Harga</p>
                                                </div>
                                                <div class="col-1">
                                                    <p> :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p>@currency($wo->harga )</p>
                                                </div>
                                            </div>
                                            <div class="row row border-bottom">
                                                <div class="col-4">
                                                    <p>Keterangan</p>
                                                </div>
                                                <div class="col-1">
                                                    <p> :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p>{{ $wo->keterangan }}</p>
                                                </div>
                                            </div>
                                            <div class="row row border-bottom">
                                                <div class="col-4">
                                                    <p>Weding Organizer</p>
                                                </div>
                                                <div class="col-1">
                                                    <p> :</p>
                                                </div>
                                                <div class="col-7">
                                                    <p>{{ DB::table('vendors')->where('id', $wo->product1)->value('nama_product') }}</p>
                                                </div>
                                            </div>
                                            @if ( $wo->product2 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Gedung</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product2)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ( $wo->product3 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Catering</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product3)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ( $wo->product4 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Rias</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product4)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ( $wo->product5 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Dekor</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product5)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ( $wo->product6 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Hiburan</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product6)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ( $wo->product7 )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Lain-lain</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p>{{ DB::table('vendors')->where('id', $wo->product7)->value('nama_product') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @php
                                                $p1=DB::table('vendors')->where('id', $wo->product1)->value('deleted_at');
                                                $p2=DB::table('vendors')->where('id', $wo->product2)->value('deleted_at');
                                                $p3=DB::table('vendors')->where('id', $wo->product3)->value('deleted_at');
                                                $p4=DB::table('vendors')->where('id', $wo->product4)->value('deleted_at');
                                                $p5=DB::table('vendors')->where('id', $wo->product5)->value('deleted_at');
                                                $p6=DB::table('vendors')->where('id', $wo->product6)->value('deleted_at');
                                                $p7=DB::table('vendors')->where('id', $wo->product7)->value('deleted_at');
                                            @endphp
                                            @if ( $p1!==null or $p2!==null or$p3!==null or $p4!==null or $p5!==null or $p6!==null or $p7!==null )
                                                <div class="row row border-bottom">
                                                    <div class="col-4">
                                                        <p>Status</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p> :</p>
                                                    </div>
                                                    <div class="col-7">
                                                        <p style="color: red">Paket Sudah Tidak Tersedia</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <form action="/pesan/{{ $pesanan->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class=" btn genric-btn danger circle arrow"><i class="fa fa-trash" aria-hidden="true"></i>-Hapus</button>
                            </form>
                            @if ( $p1!==null or $p2!==null or$p3!==null or $p4!==null or $p5!==null or $p6!==null or $p7!==null)
                            @else
                            <a href="#" class="btn genric-btn info circle arrow" data-target="#modal-default-1-{{ $pesanan->id }}" data-dismiss="modal" data-toggle="modal">Bayar</a>
                            @endif

                        </div>
                    </div>
                    </div>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="modal-default-1-{{ $pesanan->id }}">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Check Out</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/pesanan/{{ $pesanan->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <x-custom-input field="tgl_acara" label="Tanggal Acara" type="date"/>
                                {{-- <x-custom-input field="alamatacara" label="Alamat Acara / Lokasi Acara" type="text"/> --}}
                                @if ( $wo->product2 != null )
                                @else
                                    <x-custom-input field="alamatacara" label="Lokasi Acara" type="text"/>
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Notes .?</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pesan"></textarea>
                                        @error('pesan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="cek">
                                        <label class="form-check-label" for="exampleCheck1"><a href="#" data-toggle="modal" data-target="#exampleModalCenter" style="color: goldenrod"> Menyetujui Syarat Dan Ketentuan Feelight.ID</a></label>
                                        @error('cek')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            @endforeach

            <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Selamat datang di Feelight.ID<br>
                            1. pelanggan atau user yang memesan sebuah paket Weding Organizer sekurang harap mencantumkan Tanggal acara yang benar-benar valid.
                            <br>
                            2. pembayan DP feelight.ID adalah 30% dari harga total
                            <br>
                            3. pembayan Pelunasan feelight.ID adalah 70% dari harga total. Pembayaran pelunasan ini harus dilakukan sekurang-kurang 3 (tiga) hari sebelum acara dilaksakan.dan apabila pembayaran tidak dilakukan sampai 12 jam sebelum acara maka pemesanan paket feelight.ID akan dianggap telah selesai dan segala pembayaran untuk pemesanan paket akan hangus dan tidak bisa dikembalikan.
                        </div>

                    </div>
                    </div>
                </div>
        </section>
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
 @endsection
