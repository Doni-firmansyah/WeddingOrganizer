<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                    <th scope="col">No</th>
                    <th scope="col">Nama Vendor</th>
                    <th scope="col">Nama Product</th>
                    <th scope="col">Jumlah Terpesan</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ( $transaksidetails as $transaksidetail )
                    <tr class="table-secondary">
                        <th scope="row" >{{ $no++ }}</th>
                        <td>{{ $nama=$transaksidetail->nama_vendor }}</td>
                        <td></td>
                        <td>{{ DB::table('transaksidetails')->where('nama_vendor',$nama)->count() }}</td>
                    </tr>
                        @php
                            $dataa = DB::table('transaksidetails')->where('nama_vendor', $nama)->get();
                        @endphp
                        @foreach ($dataa as $data )
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>{{ $data->product_vendor }}</td>
                            <td>{{ DB::table('transaksidetails')->where('product_vendor',$data->product_vendor)->count() }}</td>
                        </tr>
                        @endforeach


                    @endforeach
                </tbody>
              </table>
              <div class="data mt-5 col-12" >
                  <div class="row col-12">
                        <div class="col-sm"> </div>
                        <div class="col-sm"> Malang, {{ \Carbon\Carbon::parse( $dt)->format('d/M/Y') }}
                            <br>Vendor Management<br><br><br><br><br>
                            {{ Auth::user()->name }}</div>
                  </div>

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





