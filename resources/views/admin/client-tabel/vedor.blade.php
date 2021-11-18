<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Export PDF Laravel 8!</title>
        <style>
            #watermark { position: fixed; opacity: .1; }
        </style>
  </head>
  <body>
    <div id="watermark"><img src="{{ public_path('/image/user/logomerah.png') }}"></div>
{{-- @extends('layouts.dashboard')


@section('content') --}}
    <div class="container">
        <div class="data">
            <table class="table">
                <thead>
                <tr>
                    <th class="table-active" colspan="4" scope="col">Daftar Pesanan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nama Layanan</td>
                    <td>:</td>
                    <td colspan="2">{{ $transaksi->vendor->nama_product }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pelaksanaan</td>
                    <td>:</td>
                    <td colspan="2">{{ \Carbon\Carbon::parse($transaksi->transaksi->tgl_acara )->format('d-M-Y') }}</td>
                </tr>
                <tr>
                    <td>Lokasi Acara</td>
                    <td>:</td>
                    <td colspan="2">{{$transaksi->lokasi }}</td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td colspan="2">{{$transaksi->nama_pemesan }}</td>
                </tr>
                <tr>
                    <td>Pesan Untuk layanan</td>
                    <td>:</td>
                    <td colspan="2">{{$transaksi->pesan }}</td>
                </tr>
                {{-- <tr>
                    <td>Nama Pemsan</td>
                    <td>:</td>
                    <td colspan="2">http://127.0.0.1:8000/vendors</td>
                </tr> --}}
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td colspan="2">@currency($harga=DB::table('vendors')->where('id', $transaksi->vendor_id)->value('harga'))</td>
                </tr>
                <tr>
                    <td>DP Terbayarkan</td>
                    <td>:</td>
                    <td colspan="2">@currency($dp=$transaksi ->nominal_dp)</td>
                </tr>
                <tr>
                    <td>Total Pelunasan</td>
                    <td>:</td>
                    <td colspan="2">@currency($pelunasan=$transaksi ->nominal_pelunasan)</td>
                </tr>
                <tr>
                    <td>Beban Feelight.ID</td>
                    <td>:</td>
                    <td colspan="2">@currency($harga-$dp-$pelunasan)</td>
                </tr>

                </tbody>
            </table>
        </div>

{{-- @endsection --}}
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



