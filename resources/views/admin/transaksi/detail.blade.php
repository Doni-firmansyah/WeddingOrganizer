@extends('layouts.dashboard')

@section('title')
Dashboard User
@endsection

@section('subtitle')
Dashboard List User
@endsection

@section('content')

<div class="row">
    <div class="col-md-4">
      <div class="card ">
        <div class="card-footer ">
          <div class="legend">
            <img src="/image/{{ $transaksis->wo->gambar }} "alt="Card image cap" style="width: 100%">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-chart">
            <div class="card-header ">
                <h4 class="card-title text-uppercase">Data Paket</h4>
            </div>
            <div class="row p-3 ">
                <div class="col-3">
                   <p> Tanggal Acara</p>
                </div>
                <div class="col-1">
                    <p> :</p>
                </div>
                <div class="col-8">
                    <p>{{ \Carbon\Carbon::parse($transaksis->riwayat->tgl_acara)->format('d-M-Y') }}</p>
                </div>

                <div class="col-3">
                    <p> Nama Pemesan</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-8">
                    <p>{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('name'); }}</p>
                </div>

                <div class="col-3">
                    <p>Nama Paket</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-8">
                    <p>{{ $transaksis->wo->nama }}</p>
                </div>

                <div class="col-3 border-bottom">
                    <p> harga</p>
                </div>
                <div class="col-1 border-bottom">
                    <p>:</p>
                </div>
                <div class="col-8 border-bottom">
                    <p>@currency($transaksis->riwayat->jumlah_harga)</p>
                </div>
            </div>
            <div class="row pl-3 pr-3 ">
                <div class="col-5 border-bottom mb-3">
                    <p>Produk</p>
                </div>
                <div class="col-2 border-bottom mb-3" >
                    <p>DP</p>
                </div>
                <div class="col-2 border-bottom mb-3">
                    <p>Pelunasan</p>
                </div>
                <div class="col-3 border-bottom mb-3">
                    <p>Detail</p>
                </div>

                @foreach ( $transaksidetails as $transaksidetail)
                    <div class="col-5">
                        <p>{{ $transaksidetail->vendor->nama_product }} ~By {{ $transaksidetail->user->nama_vendor }}</p>
                    </div>
                    <div class="col-2">
                        @if ($transaksidetail->status_dp)
                            <p>{{$transaksidetail->status_dp}}</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="col-2">
                        @if ($transaksidetail->status_pelunasan)
                            <p>{{$transaksidetail->status_pelunasan}}</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info btn-sm" href="#" role="button" data-toggle="modal" data-target="#exampleModal-{{ $transaksidetail->id }}">Detail</a>
                    </div>
                @endforeach
            </div>





      </div>
    </div>
</div>


<!-- Modal -->
    @foreach ($transaksidetails as $transaksidetail)
        <div class="modal fade" id="exampleModal-{{ $transaksidetail->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="card-header mb-3">
                        <h4 class="card-title text-uppercase">{{ $transaksidetail->vendor->nama_product }} ~By {{ $transaksidetail->user->nama_vendor }}</h4>
                    </div>
                    <div class="card-body mb-3">
                        <div class="row mb-3">
                            <div class="col-4"><p>Harga</p></div>
                            <div class="col-1"><p>:</p></div>
                            <div class="col-7"><p>@currency($harga=DB::table('vendors')->where('id', $transaksidetail->vendor_id)->value('harga'))</p></div>
                                {{-- @dd($transaksidetail->vendor_id) --}}
                            <div class="col-4"><p>Dp terbayarkan</p></div>
                            <div class="col-1"><p>:</p></div>
                            <div class="col-7"><p>@currency($dp=$transaksidetail ->nominal_dp)</p></div>

                            <div class="col-4"><p>Total Pelunasan</p></div>
                            <div class="col-1"><p>:</p></div>
                            <div class="col-7"><p>@currency($pelunasan=$transaksidetail ->nominal_pelunasan)</p></div>

                            <div class="col-4"><p>Beban</p></div>
                            <div class="col-1"><p>:</p></div>
                            <div class="col-7"><p>@currency($harga-$dp-$pelunasan)</p></div>

                            <div class="col-4"><p>Pesan Dari Client</p></div>
                            <div class="col-1"><p>:</p></div>
                            <div class="col-7"><p>{{ DB::table('riwayats')->where('id', $transaksidetail ->transaksi->riwayat_id)->value('pesan')  }}</p></div>
                        </div>
                    </div>

                    {{-- form --}}
                    <form action="/dashboard/transaksi/{{ $transaksidetail ->id }}/{{ $transaksis->id }}/edit" method="POST" enctype="multipart/form-data">
                        @csrf @method('put')
                        <x-custom-input-dropdown field="status_dp" label="Status DP" value="{{ $transaksidetail ->status_dp }}" namatabel="statustransaksi" namacolom="admin"/>
                        <x-custom-input field="nominal_dp" label="Nominal Dp" type="text" value="{{ $transaksidetail ->nominal_dp }}"/>
                        <x-custom-input-dropdown field="status_pelunasan" label="Status Pelunasan" value="{{ $transaksidetail ->status_pelunasan }}" namatabel="statustransaksi" namacolom="admin"/>
                        <x-custom-input field="nominal_pelunasan" label="Nominal Pelunasan" type="text" value="{{ $transaksidetail ->nominal_pelunasan }}"/>
                        <x-custom-input field="pesan" label="Pesans untuk Vendor" type="text" value="{{ $transaksidetail ->pesan }}"/>
                        <div class="row">
                            <div class="col-6">
                                <x-custom-input-img-edit1 field="image" label="Bukti Pelunasan" type="file" value="{{ $transaksidetail ->bukti_dp }}" id="{{ $transaksidetail ->id }}"/>
                            </div>
                            {{-- @dd($transaksidetail ->id) --}}
                            <div class="col-6">
                                <x-custom-input-img-edit2 field="image2" label="Bukti Pelunasan" type="file" value="{{ $transaksidetail ->bukti_pelunasan }}" id="{{ $transaksidetail ->id }}"/>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'Finance')
                            <button type="submit" class="btn btn-primary">Submit</button>
                        @endif

                    </form>
                </div>
            </div>
            </div>
        </div>
    @endforeach
<!-- Modal -->
@endsection


