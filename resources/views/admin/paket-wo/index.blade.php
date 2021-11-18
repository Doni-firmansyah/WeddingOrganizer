@extends('layouts.dashboard')

@section('title')
Dashboard Product
@endsection

@section('subtitle')
Dashboard List Product
@endsection

@section('button')
<div class="button">
    <a class="btn btn-primary " href="/dashboard/paket-wo/create" role="button" >New</a>
</div>
@endsection
@section('content')
<div class="card mb-2 mr-2 ml-2">
    <h5 class="card-header">Search</h5>
    <form class="card-body" action="/dashboard/paket-wo" method="GET" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" placeholder="@if($key){{ $key }} @else Search for... @endif" name="q">
            <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit">Go!</button>
      </span>
        </div>
    </form>
</div>
<!-- /.col -->
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2" style="background-color: rgb(92, 86, 97)">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#gambar1" data-toggle="tab">All</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar2" data-toggle="tab">Paket Feelight</a></li>
          <li class="nav-item"><a class="nav-link" href="#gambar3" data-toggle="tab">Paket Custom</a></li>
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
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Bintang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $index=1;
                    @endphp
                    @foreach ($pakets as $paket )
                    @php
                        $p1=DB::table('vendors')->where('id', $paket->product1)->value('deleted_at');
                        $p2=DB::table('vendors')->where('id', $paket->product2)->value('deleted_at');
                        $p3=DB::table('vendors')->where('id', $paket->product3)->value('deleted_at');
                        $p4=DB::table('vendors')->where('id', $paket->product4)->value('deleted_at');
                        $p5=DB::table('vendors')->where('id', $paket->product5)->value('deleted_at');
                        $p6=DB::table('vendors')->where('id', $paket->product6)->value('deleted_at');
                        $p7=DB::table('vendors')->where('id', $paket->product7)->value('deleted_at');
                    @endphp
                    <tr @if ($p1!==null or $p2!==null or$p3!==null or $p4!==null or $p5!==null or $p6!==null or $p7!==null)
                            style="color: red"
                        @endif>
                        <th scope="row">{{ $index++ }}</th>
                        <td>{{ $paket->nama }}</td>
                        <td>@currency($paket->harga)</td>
                           {{-- @foreach ( $paket->vendors as $tag)
                                {{ $tag->sum('harga') }}

                                @endforeach</td> --}}

                        <td>
                            @for ($i = 0; $i < 5; ++$i)
                                <i class="fa fa-star{{ $paket->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                            @endfor
                        </td>

                        <td><a href="/dashboard/paket-wo/{{ $paket->id }}" class="btn btn-primary btn-sm">Detail</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>

            <!-- /.post -->
          </div>

          <div class="tab-pane" id="gambar2">
            <!-- The timeline -->
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Bintang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $index=1;
                    @endphp
                    @foreach ($paketfeel as $paket )
                        @php
                            $p1=DB::table('vendors')->where('id', $paket->product1)->value('deleted_at');
                            $p2=DB::table('vendors')->where('id', $paket->product2)->value('deleted_at');
                            $p3=DB::table('vendors')->where('id', $paket->product3)->value('deleted_at');
                            $p4=DB::table('vendors')->where('id', $paket->product4)->value('deleted_at');
                            $p5=DB::table('vendors')->where('id', $paket->product5)->value('deleted_at');
                            $p6=DB::table('vendors')->where('id', $paket->product6)->value('deleted_at');
                            $p7=DB::table('vendors')->where('id', $paket->product7)->value('deleted_at');
                        @endphp
                    <tr @if ($p1!==null or $p2!==null or$p3!==null or $p4!==null or $p5!==null or $p6!==null or $p7!==null)
                            style="color: red"
                        @endif>
                        <th scope="row">{{ $index++ }}</th>
                        <td>{{ $paket->nama }}</td>
                        <td>@currency($paket->harga)</td>
                           {{-- @foreach ( $paket->vendors as $tag)
                                {{ $tag->sum('harga') }}

                                @endforeach</td> --}}

                        <td>
                            @for ($i = 0; $i < 5; ++$i)
                                <i class="fa fa-star{{ $paket->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                            @endfor
                        </td>

                        <td><a href="/dashboard/paket-wo/{{ $paket->id }}" class="btn btn-primary btn-sm">Detail</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>

            <!-- The timeline -->
          </div>


          <div class="tab-pane" id="gambar3">
            {{-- content --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Bintang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $index=1;
                    @endphp
                    @foreach ($paketcustom as $paket )
                    <tr>
                        <th scope="row">{{ $index++ }}</th>
                        <td>{{ $paket->nama }}</td>
                        <td>@currency($paket->harga)</td>
                           {{-- @foreach ( $paket->vendors as $tag)
                                {{ $tag->sum('harga') }}

                                @endforeach</td> --}}

                        <td>
                            @for ($i = 0; $i < 5; ++$i)
                                <i class="fa fa-star{{ $paket->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                            @endfor
                        </td>

                        <td><a href="/dashboard/paket-wo/{{ $paket->id }}" class="btn btn-primary btn-sm">Detail</a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>

            {{-- content --}}
          </div>



        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

 <div class="row d-flex justify-content-center">

    {{-- {{ $pakets->links('pagination::bootstrap-4')}} --}}

  </div>
@endsection
