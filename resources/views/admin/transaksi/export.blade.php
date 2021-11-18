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
    {{-- <body style="background: url({{ public_path('/image/user/logomerah.png') }}); background: 0.4; "> --}}

    <div class="container"  >
        <div class="header mt-3">
            <h4>Feelight.ID</h4>
        </div>

        {{-- <div class="header mt-5">
            <h4>Data Pemesan</h4>
        </div> --}}
        <div class="row">
            <table class="table">
                {{-- <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead> --}}
                  <tbody>
                    <tr class="table-active">
                        <th colspan="4" >Data Pemesan</th>

                    </tr>
                    <tr>
                      <td>Tanggal Pesanan</td>
                      <th scope="row">:</th>
                      <td colspan="2">{{ \Carbon\Carbon::parse($transaksis->riwayat->created_at)->format('d-M-Y') }}</td>

                    </tr>
                    <tr>
                        <td>Tanggal Acara</td>
                        <th scope="row">:</th>
                        <td colspan="2">{{ \Carbon\Carbon::parse($transaksis->riwayat->tgl_acara)->format('d-M-Y') }}</td>

                      </tr>

                    <tr>
                        <td>Nama Pemesan</td>
                        <th scope="row">:</th>
                        <td colspan="2">{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('name'); }}</td>

                    </tr>

                    <tr>
                        <td>Alamat</td>
                        <th scope="row">:</th>
                        <td colspan="2">{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('alamat'); }}</td>

                    </tr>

                    <tr>
                        <td>Telp</td>
                        <th scope="row">:</th>
                        <td colspan="2">{{ DB::table('users')->where('id', $transaksis->riwayat->user_id)->value('handphone'); }}</td>

                    </tr>

                    <tr class="table-active">
                        <th colspan="4">Data Paket</th>

                    </tr>

                    <tr>
                      <td>Nama Paket</td>
                      <th scope="row">:</th>
                      <td>{{ $transaksis->wo->nama }}</td>
                      <td></td>
                    </tr>

                    <tr>
                        <td>Harga</td>
                        <th scope="row">:</th>
                        <td>@currency($transaksis->riwayat->jumlah_harga)</td>
                        <td></td>
                    </tr>

                    <tr class="table-active">
                        <th scope="col">produk</th>
                        <th scope="col">DP</th>
                        <th scope="col">Pelunasan</th>
                        <th scope="col">Total</th>
                    </tr>
                        {{-- herek2 --}}
                    @foreach ( $transaksidetails as $transaksidetail)
                        <tr>
                            <td scope="col">{{ $transaksidetail->vendor->nama_product }} ~By {{ $transaksidetail->user->nama_vendor }}</td>
                            <td scope="col">
                                @if ($transaksidetail->status_dp)
                                    @currency($transaksidetail->nominal_dp)
                                @else
                                    -
                                @endif
                            </td>
                            <td scope="col">
                                @if ($transaksidetail->status_pelunasan)
                                    @currency($transaksidetail->nominal_pelunasan)
                                @else
                                    -
                                @endif
                            </td>
                            <td scope="col">
                                @if ($transaksidetail->status_pelunasan or $transaksidetail->status_dp )
                                    @currency($transaksidetail->nominal_pelunasan + $transaksidetail->nominal_dp)
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-active">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                        <th scope="col">
                            @php
                                $data=DB::table('transaksidetails')->where('transaksi_id', $transaksis->id)->sum('nominal_dp');
                                $data2=DB::table('transaksidetails')->where('transaksi_id', $transaksis->id)->sum('nominal_pelunasan');

                            @endphp
                            @currency($data+$data2 )
                        </th>
                    </tr>

                  </tbody>
            </table>
        </div>
        <div class="data mt-5 col-12" >
            <div class="row col-12">
                  <div class="col-sm"> </div>
                  <div class="col-sm"> Malang, {{ \Carbon\Carbon::parse( $dt)->format('d/M/Y') }}
                      <br>Finance<br><br><br><br><br>
                      {{ Auth::user()->name }}</div>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
