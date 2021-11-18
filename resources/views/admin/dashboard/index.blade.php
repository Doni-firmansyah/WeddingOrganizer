@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('subtitle')
Dashboard
@endsection

@section('content')
<!-- /.col -->
<div class="conten-1">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ DB::table('users')->where('role',null)->count(); }}</h3>
            <p>Jumlah User</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ DB::table('users')->where('role','vendor')->count(); }}</h3>

            <p>Jumlah Vendor</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ DB::table('users')->where('role','admin')->count()+
                 DB::table('users')->where('role','Finance')->count() +
                 DB::table('users')->where('role','Ceo')->count() +
                 DB::table('users')->where('role','Vendormanagent')->count() +
                 DB::table('users')->where('role','Clientmanagent')->count() }}
                </h3>

            <p>Other</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ DB::table('users')->count(); }}</h3>

            <p>Total</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>
</div>
<div class="conten-1">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','1')->count(); }}</h3>
            <h5>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h5>
            <p>Pesanan Masuk</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','2')->count(); }}</h3>
            <h5>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h5>
            <p>Pesanan Diterima/Diproses</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','3')->count(); }}</h3>
            <h5>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h5>
            <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h3>
            <h5>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h5>
            <p>Ditolak</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>
</div>
<div class="conten-1">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ DB::table('wos')->where('tipe','reguler')->count(); }}</h3>
            <p>Total Produk WO</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','2')->count(); }}</h3>
            <p>Total Produk WO Custom</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ DB::table('wos')->where('keterangan_paket','wo')->count(); }}</h3>
            <p>Total Produk WO</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        {{-- <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h3>
            <p>Nominal Produk WO Custom</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
        </div>
        <!-- ./col -->
    </div>
</div>
<div class="conten-1">
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ DB::table('undangans')->count(); }}</h3>
            <p>Total Undangan</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        {{-- <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','2')->count(); }}</h3>
            <p>Total Undangan Dipesan</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        {{-- <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','3')->count(); }}</h3>
            <p>Nomial Produk WO</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        {{-- <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ DB::table('riwayats')->where('status_id','4')->count(); }}</h3>
            <p>Nominal Produk WO Custom</p>
            </div>
            <div class="icon">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div> --}}
        </div>
        <!-- ./col -->
    </div>
</div>

@endsection
