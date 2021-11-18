@extends('layouts.dashboard')

@section('title')
Dashboard Product
@endsection

@section('subtitle')
Dashboard List Product
@endsection

@section('button')
<div class="button m-4">
    <a class="btn btn-primary " href="/dashboard/paket-undangan/create" role="button" >New</a>
</div>
@endsection
@section('content')
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
        <tr>
            <th scope="row">{{ $index++ }}</th>
            <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
            <td>{{ DB::table('users')->where('id', $pesanan->user_id)->value('name'); }}</td>
            <td>{{$pesanan->status->pesanan_admin}}</td>

            <td>{{ $pesanan->jumlah_harga}}</td>
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

 <div class="row d-flex justify-content-center">

    {{-- {{ $vendors->links('pagination::bootstrap-4')}} --}}
    {{-- modal --}}
 @foreach ( $pesanans as $riwayat )
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
                            <div class="row">
                            <div class="col-4">Status Pesanan</div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ DB::table('statuses')->where('id', $data->status_id)->value('pesanan_admin') }}</div>
                            </div>
                            <hr class="border-bottom">
                            <div class="row">
                            <div class="col-4">Tanggal Acara</div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $data->tgl_acara}}</div>
                            </div>
                            <hr class="border-bottom">
                            <div class="row">
                            <div class="col-4">Jumlah Harga</div>
                            <div class="col-1">:</div>
                            <div class="col-7">{{ $data->jumlah_harga}}</div>
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



            {{-- <p>One fine body&hellip;</p> --}}
            {{-- isi disini --}}
            {{-- <form action="/dashboard/pesanan/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')
                    <x-custom-input-dropdown-status field="status" label="Status" value="{{ $riwayat ->status->pesanan_admin }}" namatabel="statuses" namacolom="pesanan_admin"/>
                    <div class="form-group">
                        <label for="nominal_dp">Nominal DP</label>
                        <input type="text" class="form-control" id="nominal_dp" name="nominal_dp" value="{{ $riwayat ->jumlah_harga*0.3 }}">
                        @error('nominal_dp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
            {{-- <sini --}}

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
          {{-- <button type="button" data-dismiss="modal" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Edit</button> --}}
        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- /.modal 2 -->
  <div class="modal fade mt-5" id="modal-default">
    <div class="modal-dialog mt-5">
      <div class="modal-content mt-5">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
        </div>
        {{-- <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

  <!-- /.modal 2 -->
</div>

 @endforeach
 {{-- modal --}}
</div>




@endsection



