@extends('layouts.user')
@section('index')
    @include('user.component.header')
        <section class="pricing-card-area section-padding10 section-bg pt-5" data-background="/wedding/assets/img/gallery/section_bg1.png">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">
                        <div class="section-tittle text-center mb-70">
                            <h2>Riwayat Pemesanan</h2>
                            <div class="mt-4">
                                <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                                {{-- <div class="card-header ">
                                    <h4 class="card-title text-uppercase">Detail Riwayat Pemesanan</h4>
                                </div> --}}
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Jumlah Harga</th>
                                            <th scope="col">Bukti Pembayaran DP</th>
                                            <th scope="col">Bukti Pembayaran Pelunasan</th>
                                            <th scope="col">Detail</th>
                                          </tr>
                                        </thead>
                                        @php
                                            $no=1;
                                        @endphp
                                       @foreach ( $riwayats as $riwayat )
                                       <tr
                                       @if ( $riwayat->tgl_acara < $date && $riwayat->status_pelunasan=="" or $riwayat->tgl_acara < $date && $riwayat->status_pelunasan=="1"  )
                                            class="table-danger"
                                       @else


                                       @endif
                                       >
                                       {{-- @dd($riwayat->tgl_acara) --}}
                                       {{-- @dd($date) --}}
                                        <td scope="col">{{ $no++ }}</td>
                                        <td scope="col">{{ \Carbon\Carbon::parse($riwayat->tgl_acara)->format('d/m/Y')}}</td>
                                        <td scope="col">{{ $riwayat->status->pesanan_user }}</td>
                                        <td scope="col">@currency($riwayat->jumlah_harga)</td>
                                        <td scope="col">
                                            @if ($riwayat->status_dp=="")
                                                Belum Diupload
                                            @else
                                               {{ DB::table('statuses')->where('id', $riwayat->status_dp)->value('pembayaran_user');}}
                                            @endif
                                        </td>
                                        <td scope="col">
                                            @if ($riwayat->status_pelunasan=="")
                                                Belum Diupload
                                            @else
                                               {{ DB::table('statuses')->where('id', $riwayat->status_pelunasan)->value('pembayaran_user');}}
                                            @endif
                                        </td>
                                        <td scope="col"><a href="#" class="genric-btn info circle arrow small" data-target="#modal-default-{{ $riwayat->id }}"  data-toggle="modal"><i class="fa fa-info"></i>Detail</a></td>
                                      </tr>

                                       @endforeach
                                      </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{-- modal --}}
                @foreach ( $riwayats as $riwayat )
                <div class="modal fade mt-5" id="modal-default-{{ $riwayat->id }}">
                    <div class="modal-dialog mt-5">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Feelight.ID</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-header ">
                                <h4 class="card-title text-uppercase">Pemesanan Berhasil</h4>
                                <p>Pesanan anda sudah sukses dicheck out selanjutnya staff kami akan menghubungi anda dan pastikan nomor telefon diprofil aktif dan bisa dihubungi, untuk pembayaran silahkan transfer di rekening Bank BRI Nomer Rekening : xxxxx-xxxxxxx-xxx dengan keterangan pembayaran :</p>
                                @if ( DB::table('riwayats')->where('id',  $riwayat->id)->value('status_dp')=='')
                                    <table class="table table-bordered">
                                        <thead class="table-active">
                                            <tr>
                                                <th scope="col">Dp</th>
                                                <th scope="col">@currency($riwayat->jumlah_harga*0.3)</th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Atau</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pembayaran Dimuka</th>
                                                <th scope="col">@currency($riwayat->jumlah_harga)</th>
                                              </tr>
                                        </thead>
                                    </table>
                                @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='' or DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='1')
                                <table class="table table-bordered">
                                    <thead class="table-active">
                                        <tr>
                                            <th scope="col">Pembayaran Pelunasan</th>
                                            <th scope="col">@currency($riwayat->jumlah_harga - $riwayat->nominal_dp)</th>
                                        </tr>
                                    </thead>
                                </table>

                                @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='2')

                                @endif
                                @if ($riwayat->tgl_acara < $date && $riwayat->status_pelunasan ==null or $riwayat->status_pelunasan =='1' )
                                    <p style="color:red">Batas Pembayaran Tanggal {{ \Carbon\Carbon::parse($riwayat->tgl_acara)->addDays(-3)->format('d-m-Y') }} </p>
                                @else
                                    <p>Batas Pelunasan Tanggal {{ \Carbon\Carbon::parse($riwayat->tgl_acara)->addDays(-3)->format('d-m-Y') }} </p>
                                @endif
                                {{-- <table class="table table-bordered">
                                    <thead class="table-active">
                                      <tr>
                                        <th scope="col">Dp</th>
                                        <th scope="col">@currency($riwayat->jumlah_harga*0.3)</th>
                                      </tr>
                                      <tr>
                                        <th scope="col">Pelunasan</th>
                                        <th scope="col">@currency($riwayat->jumlah_harga*0.7)</th>
                                      </tr>
                                      <tr>
                                        <th scope="col">Total</th>
                                        <th scope="col">@currency($riwayat->jumlah_harga)</th>
                                      </tr>
                                    </thead>
                                </table> --}}

                            </div>

                            @php
                                // $users = DB::table('pesanan_riwayat')->where('riwayats_id',  $riwayat->id )->get();
                                $no=1;
                            @endphp

                                <table class="table table-bordered">
                                    <thead>
                                    <tr  class="table-active">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Paket</th>
                                        <th scope="col">Katerangan</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                    </thead>
                                        {{-- @foreach (  $riwayats as  $user) --}}
                                            @php $produkid = DB::table('pesanans')->where('id',  $riwayat->pesanan_id )->first(); @endphp
                                                <tbody>
                                                <tr>
                                                    <th scope="row">{{ $no++ }}</th>
                                                    <td>
                                                        @if (  $produkid->keterangan_paket =="undangan")
                                                            {{ DB::table('undangans')->where('id', $produkid->produk_id)->value('nama'); }}
                                                        @else
                                                            {{ DB::table('wos')->where('id', $produkid->produk_id)->value('nama'); }}
                                                        @endif
                                                    </td>
                                                    <td>{{  $produkid->keterangan_paket }}</td>
                                                    <td>
                                                        @if (  $produkid->keterangan_paket =="undangan")
                                                        @currency(DB::table('undangans')->where('id', $produkid->produk_id)->value('harga'))
                                                        @else
                                                        @currency( DB::table('wos')->where('id', $produkid->produk_id)->value('harga') )
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                        {{-- @endforeach --}}

                                        <tbody>
                                            <tr class="table-active">
                                                <td colspan="2"></td>
                                                <td>Total</td>
                                                <td> @currency($riwayat->jumlah_harga)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>DP</td>
                                                <td>@currency($riwayat->nominal_dp)</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>Pelunasan</td>
                                                <td>@currency($riwayat->nominal_pelunasan)</td>
                                            </tr>

                                            <tr class="table-active">
                                                <td colspan="2"></td>
                                                <td>Kekurangan</td>
                                                <td>@currency($riwayat->jumlah_harga-$riwayat->nominal_dp-$riwayat->nominal_pelunasan)</td>
                                            </tr>
                                        </tbody>
                                </table>
                        </div>

                        <div class="modal-footer justify-content-between">
                            {{-- <button type="button" class="btn genric-btn info circle" data-dismiss="modal">Close</button> --}}
                            <form action="/riwayat/{{ $riwayat ->id }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('put')
                                {{-- {{ $riwayat->id }} --}}
                                @if ( DB::table('riwayats')->where('id',  $riwayat->id)->value('status_dp')=='' or DB::table('riwayats')->where('id',  $riwayat->id)->value('status_dp')=='1')
                                        <x-custom-input-img-edit1 field="image" label="Bukti Pembayaran DP" type="file"  value="{{ $riwayat ->gambar_dp }}" id="{{ $riwayat ->id }}"/>
                                @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='' or DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='1')
                                    <x-custom-input-img-edit1 field="image" label="Bukti Pembayaran Untuk Pelunasan" type="file"  value="{{ $riwayat ->gambar_pelunasan }}" id="{{ $riwayat ->id}}"/>
                                @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='2')
                                    <img src="/image/user/lunas.jpg" alt="">
                                @endif
                                <div class="button mt-3">
                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    @if ( DB::table('riwayats')->where('id',  $riwayat->id)->value('status_dp')=='' or DB::table('riwayats')->where('id',  $riwayat->id)->value('status_dp')=='1' )
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='' or DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='1')
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    @elseif (DB::table('riwayats')->where('id',  $riwayat->id)->value('status_pelunasan')=='2')
                                    @endif
                                </div>
                              </form>
                            {{-- <button type="button" class="btn genric-btn info circle">Upload Bukti Pembayaran</button> --}}

                        </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                {{-- modal --}}
                @endforeach
        </section>
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
 @endsection
