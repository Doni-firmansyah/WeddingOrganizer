@extends('layouts.dashboard')

@section('title')
Dashboard Penanan
@endsection

@section('subtitle')
Dashboard Pesanan Untuk Proses Pesanan
@endsection

{{-- @section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-undangan/create" role="button" >New</a>
</div>
@endsection --}}
@section('content')
<!-- /.col -->
<div class="card mb-2 mr-2 ml-2">
    <h5 class="card-header">Search</h5>
    <form class="card-body" action="/dashboard/pesanan" method="GET" role="search">
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
                <li class="nav-item"><a class="nav-link" href="#gambar2" data-toggle="tab">Pesanan Masuk</a></li>
                <li class="nav-item"><a class="nav-link" href="#gambar3" data-toggle="tab">Pesanan Diproses</a></li>
                <li class="nav-item"><a class="nav-link" href="#gambar4" data-toggle="tab">Pesanan Selesai</a></li>
                <li class="nav-item"><a class="nav-link" href="#gambar5" data-toggle="tab">Pesanan Ditolak</a></li>
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
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">DP</th>
                                <th scope="col">Pelunasan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index=1;
                                @endphp
                                @foreach ($alldata as $pesanan )
                                <tr
                                    @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='1')
                                    class="bg-danger"
                                    @endif
                                    @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='')
                                        class="bg-danger"
                                    @endif
                                    @if ($pesanan->status_dp=='2' && $pesanan->status_pelunasan=='2')
                                        class="bg-success"
                                    @endif
                                    @if ($pesanan->status_pelunasan=="1")
                                        class="bg-info"
                                    @endif
                                    @if ($pesanan->status_dp=="1")
                                        class="bg-info"
                                    @endif
                                    @if ($pesanan->status_id=="1")
                                        class="bg-warning"
                                    @endif
                                >
                                    <th scope="row">{{ $index++ }}</th>

                                    <td>{{ \Carbon\Carbon::parse($pesanan->tgl_acara)->format('d-m-Y')}}</td>
                                    <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
                                    <td>{{$pesanan->status->pesanan_admin}}</td>

                                    <td>@currency($pesanan->jumlah_harga)</td>
                                    <td>
                                        @if ( $pesanan->status_dp =="")
                                            Belum
                                        @else
                                        {{ DB::table('statuses')->where('id', $pesanan->status_dp)->value('pembayaran_admin') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $pesanan->status_pelunasan =="")
                                            Belum
                                        @else
                                            {{ DB::table('statuses')->where('id', $pesanan->status_pelunasan)->value('pembayaran_admin') }}
                                        @endif
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm" data-target="#modal-lg-{{ $pesanan->id }}"  data-toggle="modal">Detail</a></td>
                                </tr>
                                {{-- modal 2 --}}

                                {{-- modal 2 --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="gambar2">
                        <!-- The timeline -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">DP</th>
                                <th scope="col">Pelunasan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index=1;
                                @endphp
                                @foreach ($pesanans as $pesanan )
                                    <tr
                                            @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='1')
                                            class="bg-danger"
                                            @endif
                                            @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='')
                                                class="bg-danger"
                                            @endif
                                            @if ($pesanan->status_dp=='2' && $pesanan->status_pelunasan=='2')
                                                class="bg-success"
                                            @endif
                                            @if ($pesanan->status_pelunasan=="1")
                                                class="bg-info"
                                            @endif
                                            @if ($pesanan->status_dp=="1")
                                                class="bg-info"
                                            @endif
                                            @if ($pesanan->status_id=="1")
                                                class="bg-warning"
                                            @endif
                                        >

                                        <th scope="row">{{ $index++ }}</th>
                                        <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                        <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
                                        <td>{{$pesanan->status->pesanan_admin}}</td>

                                        <td>@currency($pesanan->jumlah_harga)</td>
                                        <td>
                                            @if ( $pesanan->status_dp =="")
                                                Belum
                                            @else
                                            {{ DB::table('statuses')->where('id', $pesanan->status_dp)->value('pembayaran_admin') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $pesanan->status_pelunasan =="")
                                                Belum
                                            @else
                                                {{ DB::table('statuses')->where('id', $pesanan->pelunasan)->value('pembayaran_admin') }}
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm" data-target="#modal-lg-{{ $pesanan->id }}"  data-toggle="modal">Detail</a></td>
                                    </tr>
                                {{-- modal 2 --}}

                                {{-- modal 2 --}}
                                @endforeach
                            </tbody>
                        </table>
                        <!-- The timeline -->
                    </div>


                    <div class="tab-pane" id="gambar3">
                        {{-- content 3 --}}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Jumlah Harga</th>
                                    <th scope="col">DP</th>
                                    <th scope="col">Pelunasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index=1;
                                    @endphp
                                    @foreach ($pesanansproses as $pesanan )
                                    <tr
                                        @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='1')
                                        class="bg-danger"
                                        @endif
                                        @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='')
                                            class="bg-danger"
                                        @endif
                                        @if ($pesanan->status_dp=='2' && $pesanan->status_pelunasan=='2')
                                            class="bg-success"
                                        @endif
                                        @if ($pesanan->status_pelunasan=="1")
                                            class="bg-info"
                                        @endif
                                        @if ($pesanan->status_dp=="1")
                                            class="bg-info"
                                        @endif
                                    >
                                        <th scope="row">{{ $index++ }}</th>

                                        <td>{{ \Carbon\Carbon::parse($pesanan->tgl_acara)->format('d-m-Y')}}</td>
                                        <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
                                        <td>{{$pesanan->status->pesanan_admin}}</td>

                                        <td>@currency($pesanan->jumlah_harga)</td>
                                        <td>
                                            @if ( $pesanan->status_dp =="")
                                                Belum
                                            @else
                                            {{ DB::table('statuses')->where('id', $pesanan->status_dp)->value('pembayaran_admin') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ( $pesanan->status_pelunasan =="")
                                                Belum
                                            @else
                                                {{ DB::table('statuses')->where('id', $pesanan->status_pelunasan)->value('pembayaran_admin') }}
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-primary btn-sm" data-target="#modal-lg-{{ $pesanan->id }}"  data-toggle="modal">Detail</a></td>
                                    </tr>
                                    {{-- modal 2 --}}

                                    {{-- modal 2 --}}
                                    @endforeach
                                </tbody>
                            </table>
                        {{-- content --}}
                    </div>

                    <div class="tab-pane" id="gambar4">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col">DP</th>
                                <th scope="col">Pelunasan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index=1;
                                @endphp
                                @foreach ($pesanansselesai as $pesanan )
                                <tr
                                        @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='1')
                                        class="bg-danger"
                                        @endif
                                        @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='')
                                            class="bg-danger"
                                        @endif
                                        @if ($pesanan->status_dp=='2' && $pesanan->status_pelunasan=='2')
                                            class="bg-success"
                                        @endif
                                        @if ($pesanan->status_pelunasan=="1")
                                            class="bg-info"
                                        @endif
                                        @if ($pesanan->status_dp=="1")
                                            class="bg-info"
                                        @endif
                                    >
                                    <th scope="row">{{ $index++ }}</th>
                                    <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                    <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
                                    <td>{{$pesanan->status->pesanan_admin}}</td>

                                    <td>@currency($pesanan->jumlah_harga)</td>
                                    <td>
                                        @if ( $pesanan->status_dp =="")
                                            Belum
                                        @else
                                        {{ DB::table('statuses')->where('id', $pesanan->status_dp)->value('pembayaran_admin') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $pesanan->status_pelunasan =="")
                                            Belum
                                        @else
                                            {{ DB::table('statuses')->where('id', $pesanan->status_pelunasan)->value('pembayaran_admin') }}
                                        @endif
                                    </td>
                                    <td><a href="#" class="btn btn-primary btn-sm" data-target="#modal-lg-{{ $pesanan->id }}"  data-toggle="modal">Detail</a></td>
                                </tr>
                                {{-- modal 2 --}}

                                {{-- modal 2 --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="gambar5">
                        {{-- content --}}
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Jumlah Harga</th>
                                    <th scope="col">DP</th>
                                    <th scope="col">Pelunasan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index=1;
                                    @endphp
                                    @foreach ($pesananstidak as $pesanan )
                                        <tr
                                            @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='1')
                                            class="bg-danger"
                                            @endif
                                            @if ($pesanan->tgl_acara < $date && $pesanan->status_dp=='2' && $pesanan->status_pelunasan=='')
                                                class="bg-danger"
                                            @endif
                                            @if ($pesanan->status_dp=='2' && $pesanan->status_pelunasan=='2')
                                                class="bg-success"
                                            @endif
                                            @if ($pesanan->status_pelunasan=="1")
                                                class="bg-info"
                                            @endif
                                            @if ($pesanan->status_dp=="1")
                                                class="bg-info"
                                            @endif
                                            >

                                            <th scope="row">{{ $index++ }}</th>
                                            <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                            <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
                                            <td>{{$pesanan->status->pesanan_admin}}</td>

                                            <td>@currency($pesanan->jumlah_harga)</td>
                                            <td>
                                                @if ( $pesanan->status_dp =="")
                                                    Belum
                                                @else
                                                {{ DB::table('statuses')->where('id', $pesanan->status_dp)->value('pembayaran_admin') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ( $pesanan->status_pelunasan =="")
                                                    Belum
                                                @else
                                                    {{ DB::table('statuses')->where('id', $pesanan->pelunasan)->value('pembayaran_admin') }}
                                                @endif
                                            </td>
                                            <td><a href="#" class="btn btn-primary btn-sm" data-target="#modal-lg-{{ $pesanan->id }}"  data-toggle="modal">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <!-- The timeline -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-bodysaddddddddddddddddddddddddddddddddddddddddddddd -->
        <!-- /.card -->
        <div class="row mr-1 ml-1">
            <div class="col-sm-4 col-md-3">
                <div class="color-palette-set">
                    <div class="bg-info color-palette"><span>Ronspon Pembayaran</span></div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-md-3">
                <div class="color-palette-set">
                    <div class="bg-success color-palette"><span>Pembayaran Lunas</span></div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-md-3">
                <div class="color-palette-set">
                    <div class="bg-warning color-palette"><span>Respon Pesanan</span></div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="color-palette-set">
                    <div class="bg-danger color-palette"><span>Batas pelunasan Mau habis</span></div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="row d-flex justify-content-center"> --}}
        @foreach ( $alldata as $riwayat )
            <div class="modal fade" id="modal-lg-{{ $riwayat->id }}">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Feelight.ID</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body mb-3">
                            {{-- <p>One fine body&hellip;</p> --}}
                                <h4 class="card-title text-uppercase">Detail Pesanan</h4>
                                    @php
                                        $data=DB::table('riwayats')->where('id', $riwayat->id)->first();
                                    @endphp
                                    <br>
                                    <div class="container">
                                        <div class="conten p-2">
                                                <hr class="border-bottom">
                                            <div class="row ">
                                            <div class="col-4">Nama Pemesan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ DB::table('users')->where('id', $data->user_id)->value('name') }}</div>
                                            </div>
                                                <hr class="border-bottom">
                                            <div class="row ">
                                            <div class="col-4">Product yang Dipesan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ DB::table('wos')->where('id', $riwayat->pesanan->produk_id)->value('nama') }}</div>
                                            </div>
                                                <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Status Pesanan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ DB::table('statuses')->where('id', $data->status_id)->value('pesanan_admin') }}</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Tanggal Acara</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ \Carbon\Carbon::parse($data->tgl_acara)->format('d-M-Y') }}</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Jumlah Harga</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">@currency($data->jumlah_harga)</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Uang Dp</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">@currency($data->nominal_dp)</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Uang Pelunasan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">@currency($data->nominal_pelunasan)</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Note Pesanan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ $data->pesan}}</div>
                                            </div>
                                        </div>
                                    </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="card-footer ">
                                        <div class="legend justify-content-between">
                                            @if ($data->gambar_dp=="")

                                            @else
                                                <img src="/image/{{ $data->gambar_dp }} "alt="Card image cap" style="width: 100%">
                                            @endif
                                        <hr>
                                        <h4 class="card-title text-uppercase">Pembayaran DP</h4>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-footer ">
                                        <div class="legend">

                                        @if ($data->gambar_pelunasan=="")
                                            <h5>Belum ada</h5>
                                        @else
                                            <img src="/image/{{ $data->gambar_pelunasan }} "alt="Card image cap" style="width: 100%">
                                        @endif
                                        <hr>
                                        <h4 class="card-title text-uppercase">Pembayaran Pelunasan</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            @if (Auth::user()->role == 'Clientmanagent')
                                <a href="/dashboard/client-tabel/{{ $pesanan->id }}" class="btn btn-primary btn-sm" role="btn">Cetak PDF</a>
                            @endif

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        @endforeach
        {{-- modal --}}

@endsection



