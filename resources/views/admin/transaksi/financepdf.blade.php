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
            <img src="/image/user/logohitams.png"alt="Card image cap" style="width: 100%">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-chart">
        <div class="card-header ">
            <h4 class="card-title text-uppercase">Data Pemesan</h4>
        </div>
            <div class="row p-3 ">
                <div class="col-3">
                <p> Tanggal Pesanan</p>
                </div>
                <div class="col-1">
                    <p> :</p>
                </div>
                <div class="col-8">
                    <p>{{ \Carbon\Carbon::parse($transaksis->riwayat->created_at)->format('d-M-Y') }}</p>
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
                    <p>Alamat</p>
                </div>
                <div class="col-1">
                    <p>:</p>
                </div>
                <div class="col-8">
                    <p>{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('alamat'); }}</p>
                </div>

                <div class="col-3 border-bottom">
                    <p>Telp</p>
                </div>
                <div class="col-1 border-bottom">
                    <p>:</p>
                </div>
                <div class="col-8 border-bottom">
                    <p>{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('handphone'); }}</p>
                </div>
            </div>


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
                    <p>Total</p>
                </div>

                @foreach ( $transaksidetails as $transaksidetail)
                    <div class="col-5">
                        <p>{{ $transaksidetail->vendor->nama_product }} ~By {{ $transaksidetail->user->nama_vendor }}</p>
                    </div>
                    <div class="col-2">
                        @if ($transaksidetail->status_dp)
                            <p>@currency($transaksidetail->nominal_dp)</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="col-2">
                        @if ($transaksidetail->status_pelunasan)
                            <p>@currency($transaksidetail->nominal_pelunasan)</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="col-3">
                        @if ($transaksidetail->status_dp)
                            <p>@currency( $transaksidetail->nominal_dp+$transaksidetail->nominal_pelunasan)</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                @endforeach
                <div class="col-5 border-top pt-3">
                    <p></p>
                </div>
                <div class="col-2 border-top pt-3" >
                    <p></p>
                </div>
                <div class="col-2 border-top pt-3">
                    <p>Total</p>
                </div>
                <div class="col-3 border-top pt-3">
                    {{-- <p>{{ $transaksis->id }}</p> --}}
                    @php
                        $data=DB::table('transaksidetails')->where('transaksi_id', $transaksis->id)->sum('nominal_dp');
                        $data2=DB::table('transaksidetails')->where('transaksi_id', $transaksis->id)->sum('nominal_pelunasan');

                    @endphp
                    <p>@currency($data+$data2 )</p>
                    {{-- @dd( $data) --}}
                </div>
            </div>
            @if (Auth::user()->role == 'Finance')
                <a href="/dashboard/finance/{{ $transaksis->id }}/export" class="btn btn-primary active" aria-current="page">Export pdf</a>
            @endif
      </div>
    </div>
</div>
@endsection


