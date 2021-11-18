@extends('layouts.vendor2')
@section('title')
    <h2>Layanan Vendor</h2>
@endsection
@section('button')
    <a class="btn btn-danger " href="/vendor/create" role="button">Buat Layanan</a>
@endsection
@section('content')
<div class="content" >
    <table class="table table-hover">
        <thead>
        <tr class="active">
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">Category</th>
            <th scope="col">Harga</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($vendors as $vendor )
            <tr>
                <th scope="row"><a style="color: rgb(236, 133, 8)" href="/vendor/{{ $vendor ->id}}">{{ ($vendors->currentPage() - 1)  * $vendors->count() + $loop->iteration }}</a></th>
                <td><a style="color: rgb(236, 133, 8)" href="/vendor/{{ $vendor ->id}}">{{ $vendor ->nama_product}}</a></td>
                <td><a style="color: rgb(236, 133, 8)" href="/vendor/{{ $vendor ->id}}">{{ $vendor ->status}}</a></td>
                <td><a style="color: rgb(236, 133, 8)" href="/vendor/{{ $vendor ->id}}">{{ $vendor ->categorys}}</a></td>
                <td><a style="color: rgb(236, 133, 8)" href="/vendor/{{ $vendor ->id}}">@currency($vendor ->harga)</a></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row d-flex justify-content-center">
        {{$vendors->links("pagination::bootstrap-4")}}
    </div>


    <div class="row d-flex justify-content-center mt-5">
        <h4>Order Untuk {{ Auth::user()->nama_vendor }}</h4>
    </div>
    <div class="dummy">
        {{-- isi --}}
        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" style="background-color: rgb(92, 86, 97)">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#gambar1" data-toggle="tab">All</a></li>
                  <li class="nav-item"><a class="nav-link" href="#gambar2" data-toggle="tab">Proses</a></li>
                  <li class="nav-item"><a class="nav-link" href="#gambar3" data-toggle="tab">Selesai</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#gambar4" data-toggle="tab">Gambar 4</a></li>
                  <li class="nav-item"><a class="nav-link" href="#gambar5" data-toggle="tab">Gambar 5</a></li> --}}
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="gambar1">
                    <!-- Post -->
                    <table class="table table-hover">
                        <thead>
                        <tr class="active">
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($transaksis as $transaksi )
                            <tr>
                                @php
                                    $riwayatid = DB::table('riwayats')->where('id', $transaksi->transaksi->riwayat_id)->value('status_id');
                                    $status = DB::table('statuses')->where('id', $riwayatid)->first();
                                @endphp
                                {{-- @dd($riwayatid) --}}
                                <td scope="col">{{ ($transaksis->currentPage() - 1)  * $transaksis->count() + $loop->iteration }}</td>
                                <td scope="col">{{ $transaksi->vendor->nama_product }}</td>
                                <td scope="col">@if ($status->pesanan_admin=="Diterima")
                                    Diproses
                                    @else
                                    {{ $status->pesanan_admin }}
                                    @endif
                                </td>
                                <td scope="col">Category</td>
                                <td scope="col"><button type="button" class="genric-btn success circle arrow" data-toggle="modal" data-target="#exampleModalCenter{{ $transaksi->id }}">
                                                    Detail
                                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        {{$transaksis->links("pagination::bootstrap-4")}}
                    </div>
                    <!-- /.post -->

                  </div>

                  <div class="tab-pane" id="gambar2">
                    <!-- The timeline -->
                    <table class="table table-hover">
                        <thead>
                        <tr class="active">
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($transaksisproses as $transaksi )
                            <tr>
                                @php
                                    $riwayatid = DB::table('riwayats')->where('id', $transaksi->transaksi->riwayat_id)->value('status_id');
                                    $status = DB::table('statuses')->where('id', $riwayatid)->first();
                                @endphp
                                {{-- @dd($riwayatid) --}}
                                <td scope="col">{{ ($transaksis->currentPage() - 1)  * $transaksis->count() + $loop->iteration }}</td>
                                <td scope="col">{{ $transaksi->vendor->nama_product }}</td>
                                <td scope="col">@if ($status->pesanan_admin=="Diterima")
                                    Diproses
                                    @else
                                    {{ $status->pesanan_admin }}
                                    @endif
                                </td>
                                <td scope="col">Category</td>
                                <td scope="col"><button type="button" class="genric-btn success circle arrow" data-toggle="modal" data-target="#exampleModalCenter{{ $transaksi->id }}">
                                                    Detail
                                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        {{$transaksis->links("pagination::bootstrap-4")}}
                    </div>
                    <!-- The timeline -->
                  </div>


                  <div class="tab-pane" id="gambar3">
                    {{-- content --}}
                    <table class="table table-hover">
                        <thead>
                        <tr class="active">
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($transaksisselesai as $transaksi )
                            <tr>
                                @php
                                    $riwayatid = DB::table('riwayats')->where('id', $transaksi->transaksi->riwayat_id)->value('status_id');
                                    $status = DB::table('statuses')->where('id', $riwayatid)->first();
                                @endphp
                                {{-- @dd($riwayatid) --}}
                                <td scope="col">{{ ($transaksis->currentPage() - 1)  * $transaksis->count() + $loop->iteration }}</td>
                                <td scope="col">{{ $transaksi->vendor->nama_product }}</td>
                                <td scope="col">@if ($status->pesanan_admin=="Diterima")
                                    Diproses
                                    @else
                                    {{ $status->pesanan_admin }}
                                    @endif
                                </td>
                                <td scope="col">Category</td>
                                <td scope="col"><button type="button" class="genric-btn success circle arrow" data-toggle="modal" data-target="#exampleModalCenter{{ $transaksi->id }}">
                                                    Detail
                                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        {{$transaksis->links("pagination::bootstrap-4")}}
                    </div>
                    {{-- content --}}
                  </div>

                  <div class="tab-pane" id="gambar4">
                    {{-- content --}}
                    gambar 4
                    {{-- content --}}
                  </div>

                  <div class="tab-pane" id="gambar5">
                    {{-- content --}}
                    gambar 5
                    {{-- content --}}
                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        {{-- isi --}}
    </div>

</div>
<!-- Button trigger modal -->


 <!-- Modal -->
 @foreach ($transaksis as $transaksidetail)
<div class="modal fade" id="exampleModalCenter{{ $transaksidetail->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mt-5" role="document">
      <div class="modal-content mt-5">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- <div class="card-header mb-3">
                <h4 class="card-title text-uppercase">{{ $transaksidetail->vendor->nama_product }} ~By {{ $transaksidetail->user->nama_vendor }}</h4>
            </div> --}}
            <div class="card-body mb-3">
                <div class="row mb-3">
                    <div class="col-5"><p>Nama Layanan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>{{ $transaksidetail->vendor->nama_product }}</p></div>

                    <div class="col-5"><p>Tanggal Pelaksanaan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>{{ \Carbon\Carbon::parse($transaksidetail->transaksi->tgl_acara )->format('d-M-Y') }}</p></div>

                    <div class="col-5"><p>Lokasi Acara</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>{{$transaksidetail->lokasi }}</p></div>

                    <div class="col-5"><p>Nama Pemesan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p> {{$transaksidetail->nama_pemesan }}</p></div>

                    <div class="col-5"><p>Pesan Untuk Layanan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p> {{$transaksidetail->pesan }}</p></div>

                    <div class="col-5"><p>Harga</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>@currency($harga=DB::table('vendors')->where('id', $transaksidetail->vendor_id)->value('harga'))</p></div>
                        {{-- @dd($transaksidetail->vendor_id) --}}
                    <div class="col-5"><p>Dp terbayarkan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>@currency($dp=$transaksidetail ->nominal_dp)</p></div>

                    <div class="col-5"><p>Total Pelunasan</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>@currency($pelunasan=$transaksidetail ->nominal_pelunasan)</p></div>

                    <div class="col-5"><p>Beban</p></div>
                    <div class="col-1"><p>:</p></div>
                    <div class="col-6"><p>@currency($harga-$dp-$pelunasan)</p></div>
                    {{-- <div class="row">
                        <div class="col-6"><img src="/image/{{ $transaksidetail->bukti_dp }}" alt="" width="208"></div>
                    </div> --}}
                    <div class="row">
                        @if ($transaksidetail->bukti_dp)
                            <div class="col-6">
                                <div class="row d-flex justify-content-center mt-5">
                                    <h4>Bukti DP</h4>
                                </div>
                                <img src="/image/{{ $transaksidetail->bukti_dp }}" alt="" width="180">
                            </div>
                        @elseif ($transaksidetail->bukti_pelunasan )
                            <div class="col-6">
                                <div class="row d-flex justify-content-center mt-5">
                                    <h4>Pelunasan</h4>
                                </div>
                                <img src="/image/{{ $transaksidetail->bukti_pelunasan }}" alt="" width="180">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="genric-btn success circle arrow" data-dismiss="modal">Close</button> --}}
          <a href="/vendors/cetak/{{ $transaksidetail->id }}" role="button" type="button" class="genric-btn success circle arrow">Download PDF</a>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
