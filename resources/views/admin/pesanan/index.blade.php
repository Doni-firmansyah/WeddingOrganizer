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
                                            <div class="col-7">
                                                {{-- @dd($riwayat->pesanan->keterangan_paket) --}}
                                                                @if ($riwayat->pesanan->keterangan_paket=='wo')
                                                                    <a href="#" data-dismiss="modal" data-toggle="modal" data-target=".bd-example-modal-lg{{$riwayat->pesanan->produk_id }}"> {{ DB::table('wos')->where('id', $riwayat->pesanan->produk_id)->value('nama') }}</a>
                                                                @elseif ($riwayat->pesanan->keterangan_paket=='undangan')
                                                                    <a href="/dashboard/paket-undangan/{{ DB::table('undangans')->where('id', $riwayat->pesanan->produk_id )->value('id') }} ">{{ DB::table('undangans')->where('id', $riwayat->pesanan->produk_id)->value('nama') }}</a>
                                                                @endif

                                                </div>
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
                                            <div class="col-7">{{ $data->nominal_dp}}</div>
                                            </div>
                                            <hr class="border-bottom">
                                            <div class="row">
                                            <div class="col-4">Uang Pelunasan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-7">{{ $data->nominal_pelunasan}}</div>
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
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            @if (Auth::user()->role == 'Clientmanagent')
                            <button type="button" data-dismiss="modal" class="btn btn-default" data-toggle="modal" data-target="#modal-default-{{ $data->id }}">Edit</button>
                            @endif

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <!-- /.modal 2 -->
            <div class="modal fade mt-5" id="modal-default-{{ $data->id }}">
                <div class="modal-dialog mt-5">
                    <div class="modal-content mt-5">
                        <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @if ($data->status_id=='1')
                                <form action="/dashboard/pesanan/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('put')
                                        <x-custom-input-dropdown-status field="status" label="Status" value="{{ $riwayat ->status->pesanan_admin }}" namatabel="statuses" namacolom="pesanan_admin"/>
                                        <x-custom-input-dropdown-status field="status_dp" label="Status DP" value="{{ $riwayat ->status->pembayaran_admin }}" namatabel="statuses" namacolom="pembayaran_admin"/>
                                        <div class="form-group">
                                            <label for="nominal_dp">Nominal DP</label>
                                            <input type="text" class="form-control" id="nominal_dp" name="nominal_dp" value="{{ $riwayat ->jumlah_harga*0.3 }}">
                                            @error('nominal_dp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            @elseif ($data->status_id=='2')
                                <form action="/dashboard/proses/pesanan/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('put')
                                    <x-custom-input-dropdown-status field="status" label="Status" value="{{ $riwayat ->status->pesanan_admin }}" namatabel="statuses" namacolom="pesanan_admin"/>
                                    <x-custom-input-dropdown-status field="status_pelunasan" label="Status Pelunasan" value="{{ $riwayat ->status->pembayaran_admin }}" namatabel="statuses" namacolom="pembayaran_admin"/>
                                        <div class="form-group">
                                            <label for="nominal_pelunasan">Nominal Pelunasan</label>
                                            <input type="text" class="form-control" id="nominal_pelunasan" name="nominal_pelunasan" value="{{ $riwayat ->jumlah_harga*0.7 }}">
                                            @error('nominal_dp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>

                            @elseif ($data->status_id=='3')
                                <form action="/dashboard/selesai/pesanan/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('put')
                                    <x-custom-input-dropdown-status field="status" label="Status" value="{{ $riwayat ->status->pesanan_admin }}" namatabel="statuses" namacolom="pesanan_admin"/>
                                        <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            @elseif ($data->status_id=='4')
                                <form action="/dashboard/tidak/pesanan/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('put')
                                    <x-custom-input-dropdown-status field="status" label="Status" value="{{ $riwayat ->status->pesanan_admin }}" namatabel="statuses" namacolom="pesanan_admin"/>
                                        <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @endif
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
        @endforeach
        {{-- modal --}}
    {{-- </div> --}}
    @foreach ( $wo as $vendor)
      <div class="modal fade bd-example-modal-lg{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row m-3">
                        <div class="col-5">
                            <div id="carouselExampleIndicators{{ $vendor->id }}" class="carousel slide" data-ride="carousel">
                                {{-- <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="0" class="active"></li>
                                @isset($vendor ->gambar2)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="1"></li>@endisset
                                @isset($vendor ->gambar3)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="2"></li>@endisset
                                @isset($vendor ->gambar4)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="3"></li>@endisset
                                @isset($vendor ->gambar5)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="4"></li>@endisset
                                </ol>
                                <div class="carousel-inner"> --}}
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-thumbnail" src="/image/{{ $vendor -> gambar }}" alt="First slide">
                                </div>
                                {{-- @isset($vendor ->gambar2)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img-thumbnail" src="/image/{{ $vendor -> gambar2 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($vendor ->gambar3)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img-thumbnail" src="/image/{{ $vendor -> gambar3 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($vendor ->gambar4)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img-thumbnail" src="/image/{{ $vendor -> gambar4 }}" alt="Second slide">
                                    </div>
                                @endisset
                                @isset($vendor ->gambar5)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 img-thumbnail" src="/image/{{ $vendor -> gambar5 }}" alt="Second slide">
                                    </div>
                                @endisset

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $vendor->id }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{ $vendor->id }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a> --}}
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row d-flex justify-content-center">
                                {{-- <h2>{{ $vendor ->nama_product }}</h2> --}}
                                {{-- <img src="/wedding/assets/img/gallery/tittle_img.png" alt=""> --}}
                            </div>

                            {{-- <div class="card-body mt-1">
                                <div class="row row border-bottom">
                                    <div class="col-4">
                                    <p>Product By</p>
                                    </div>
                                    <div class="col-1">
                                        <p> :</p>
                                    </div>
                                    <div class="col-7">
                                        <p>{{ DB::table('users')->where('id', $vendor->user_id)->value('nama_vendor')}}</p>
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
                                        <p>{{ DB::table('users')->where('id', $vendor->user_id)->value('instagram_vendor');}}</p>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="card-body mt-1">
                                <div class="row row border-bottom">
                                    <div class="col-5">
                                    <p> Nama Product</p>
                                    </div>
                                    <div class="col-1">
                                        <p> :</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $vendor ->nama }}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p>Keterangan Paket</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p> {{ $vendor ->keterangan_paket }}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p>Harga</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>@currency($vendor ->harga)</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Keterangan</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{ $vendor ->keterangan }}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Weding Organizer</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product1)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Gedung</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product2)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Catering</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product3)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Riasan</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product4)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Dekor</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product5)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p> Hiburan</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product6)->value('nama_product')}}</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-5">
                                        <p>Lain-lain</p>
                                    </div>
                                    <div class="col-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p>{{DB::table('vendors')->where('id', $vendor ->product7)->value('nama_product')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    @endforeach






@endsection



