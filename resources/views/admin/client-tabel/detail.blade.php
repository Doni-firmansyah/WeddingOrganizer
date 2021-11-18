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
                    <th class="table-active" colspan="4" scope="col">Data Pemesan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td colspan="2">{{ DB::table('users')->where('id', $riwayat->user_id)->value('name') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Acara</td>
                    <td>:</td>
                    <td colspan="2">{{ \Carbon\Carbon::parse($riwayat->tgl_acara)->format('d-M-Y') }}</td>
                </tr>
                <tr>
                    <td>Alamat Pemesan</td>
                    <td>:</td>
                    <td colspan="2">{{ DB::table('users')->where('id', $riwayat->user_id)->value('Alamat') }}</td>
                </tr>
                <tr>
                    <td>Alamat Pemesan</td>
                    <td>:</td>
                    <td colspan="2">{{ DB::table('users')->where('id', $riwayat->user_id)->value('handphone') }}</td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="data mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th class="table-active" colspan="4" scope="col">Data Paket</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nama Paket</td>
                    <td>:</td>
                    <td colspan="2">{{ DB::table('wos')->where('id', $riwayat->pesanan->produk_id )->value('nama') }}</td>
                </tr>
                {{-- <tr>
                    <td>Dibuat Oleh</td>
                    <td>:</td>
                    <td colspan="2">{{ \Carbon\Carbon::parse($riwayat->tgl_acara)->format('d-M-Y') }}</td>
                </tr> --}}
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td colspan="2">@currency($harga = DB::table('wos')->where('id', $riwayat->pesanan->produk_id )->value('harga') )</td>
                </tr>
                {{-- <tr>
                    <td>Pesan Dari Client</td>
                    <td>:</td>
                    <td colspan="2">{{ $riwayat->pesan}}</td>
                </tr> --}}
                <tr>
                    <td>Weding Organizer</td>
                    <td>:</td>
                    <td>{{ DB::table('vendors')->where('id',$wo->product1)->value('nama_product') }}</td>
                    <td>@currency( DB::table('vendors')->where('id',$wo->product1)->value('harga') )</td>
                </tr>
                @if ($wo->product2)
                    <tr>
                        <td>Gedung</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product2)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product2)->value('harga') )</td>
                    </tr>
                @endif
                @if ($wo->product3)
                    <tr>
                        <td>Catering</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product3)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product3)->value('harga') )</td>
                    </tr>
                @endif
                @if ($wo->product4)
                    <tr>
                        <td>Catering</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product4)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product4)->value('harga') )</td>
                    </tr>
                @endif
                @if ($wo->product5)
                    <tr>
                        <td>Catering</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product5)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product5)->value('harga') )</td>
                    </tr>
                @endif
                @if ($wo->product6)
                    <tr>
                        <td>Catering</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product6)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product6)->value('harga') )</td>
                    </tr>
                @endif
                @if ($wo->product7)
                    <tr>
                        <td>Catering</td>
                        <td>:</td>
                        <td>{{ DB::table('vendors')->where('id',$wo->product7)->value('nama_product') }}</td>
                        <td>@currency( DB::table('vendors')->where('id',$wo->product7)->value('harga') )</td>
                    </tr>
                @endif
                <tr class="table-active">
                    <td colspan="3">Total</td>
                    <td>@currency(DB::table('wos')->where('id', $riwayat->pesanan->produk_id )->value('harga') )</td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="data mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th class="table-active" colspan="4" scope="col">Data Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Pembayaran DP</td>
                    <td>:</td>
                    <td colspan="2">@currency($riwayat->nominal_dp)</td>
                </tr>
                <tr>
                    <td>Pembayaran DP</td>
                    <td>:</td>
                    <td colspan="2">@currency($riwayat->nominal_pelunasan)</td>
                </tr>
                <tr>
                    <td>Sisa Beban</td>
                    <td>:</td>
                    <td colspan="2">@currency( $riwayat->nominal_dp+$riwayat->nominal_pelunasan-$harga )</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="data mt-5 col-12" >
            <div class="row col-12">
                  <div class="col-sm"> </div>
                  <div class="col-sm"> Malang, {{ \Carbon\Carbon::parse( $dt)->format('d/M/Y') }}
                      <br>Client Management<br><br><br><br><br>
                      {{ Auth::user()->name }}</div>
            </div>

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



