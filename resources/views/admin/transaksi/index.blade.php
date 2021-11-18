@extends('layouts.dashboard')

@section('title')
Dashboard Transaksi
@endsection

@section('subtitle')
Dashboard List Transaksi ke Vendor
@endsection

@section('content')
    <div class="card mb-2">
        <h5 class="card-header">Search</h5>
        <form class="card-body" action="/dashboard/transaksi" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="@if($key){{ $key }} @else Search for... @endif" name="q">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
          </span>
            </div>
        </form>
    </div>
    <table class="table table-responsive{xl}">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Acara</th>
            <th scope="col">Nama Product</th>
            <th scope="col">Nama Pemesan</th>
            <th scope="col">Jumlah Harga</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ( $transaksis as $transaksi)
                <tr>
                    <th>1</th>
                    <td>{{ \Carbon\Carbon::parse($transaksi->riwayat->tgl_acara)->format('d-M-Y') }}</td>
                    <td>{{ $transaksi->wo->nama}}</td>
                    <td>{{ DB::table('users')->where('id', $transaksi->riwayat->user_id)->value('name') }}</td>
                    <td>@currency($transaksi->riwayat->jumlah_harga)</td>
                    @if (DB::table('transaksidetails')->where('transaksi_id', $transaksi->id)->value('transaksi_id')==null)
                        <td><a class="btn btn-info btn-sm" href="/dashboard/transaksi/proses/{{ $transaksi->id }}" role="button">Proses</a></td>
                    @else
                        <td><a class="btn btn-primary btn-sm" href="/dashboard/transaksi/{{ $transaksi->id }}" role="button">Detail</a></td>
                    @endif

                </tr>
          @endforeach
      </table>




@endsection


