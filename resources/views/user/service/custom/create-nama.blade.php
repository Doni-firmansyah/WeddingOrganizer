@extends('layouts.user')
@section('index')
    @include('user.component.header')
    @include('user.component.slider')
        <section class="pricing-card-area section-padding30 section-bg" data-background="/wedding/assets/img/gallery/section_bg1.png">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center mb-70">
                            <h2>Pemilihan Katering</h2>
                            <div class="mt-4">
                                <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                                <p>Silakan pilih Katering, Bila anda kurang berminat harap lanjut ke step selanjutnya</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- tracking --}}
                <x-progress field="{{ $wo->id }}"/>
                {{-- tracking --}}
                <div class="row align-items-end justify-content-center">
                    <div class="col-9">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">category</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">Hapus</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                      $nama=DB::table('vendors')->where('id', $wo->product1)->value('user_id');
                                      $nama2=DB::table('vendors')->where('id', $wo->product2)->value('user_id');
                                      $nama3=DB::table('vendors')->where('id', $wo->product3)->value('user_id');
                                      $nama4=DB::table('vendors')->where('id', $wo->product4)->value('user_id');
                                      $nama5=DB::table('vendors')->where('id', $wo->product5)->value('user_id');
                                      $nama6=DB::table('vendors')->where('id', $wo->product6)->value('user_id');
                                      $nama7=DB::table('vendors')->where('id', $wo->product7)->value('user_id');
                                      $nomor=1;
                                  @endphp
                            @if ($wo->product1)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product1)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product1)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product1)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product1/{{ $wo->id }}/{{ $wo->product1 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product2)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product2)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product2)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product2)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama2)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product2/{{ $wo->id }}/{{ $wo->product2 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product3)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product3)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product3)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product3)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama3)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product3/{{ $wo->id }}/{{ $wo->product3 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product4)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product4)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product4)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product4)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama4)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product4/{{ $wo->id }}/{{ $wo->product4 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product5)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product5)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product5)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product5)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama5)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product5/{{ $wo->id }}/{{ $wo->product5 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product6)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product6)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product6)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product6)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama6)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product6/{{ $wo->id }}/{{ $wo->product6 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                            @if ($wo->product7)
                                <tr>
                                    <th scope="row">{{ $nomor++ }}</th>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product7)->value('nama_product')}}</td>
                                    <td>{{ DB::table('vendors')->where('id', $wo->product7)->value('categorys')}}</td>
                                    <td>@currency(DB::table('vendors')->where('id', $wo->product7)->value('harga'))</td>
                                    <td>{{ $data=DB::table('users')->where('id', $nama7)->value('nama_vendor')}}</td>
                                    <td>
                                        <a href="/custom/product7/{{ $wo->id }}/{{ $wo->product7 }}" class="genric-btn danger circle arrow">Hapus</a>
                                    </td>
                                </tr>
                            @endif
                                @php
                                    $p1=DB::table('vendors')->where('id', $wo->product1)->value('harga');
                                    $p2=DB::table('vendors')->where('id', $wo->product2)->value('harga');
                                    $p3=DB::table('vendors')->where('id', $wo->product3)->value('harga');
                                    $p4=DB::table('vendors')->where('id', $wo->product4)->value('harga');
                                    $p5=DB::table('vendors')->where('id', $wo->product5)->value('harga');
                                    $p6=DB::table('vendors')->where('id', $wo->product6)->value('harga');
                                    $p7=DB::table('vendors')->where('id', $wo->product7)->value('harga');
                                @endphp

                                <tr class="table-active">
                                    <th scope="row"></th>
                                    <td>Total Harga</td>
                                    <td></td>
                                    <td>@currency($p1+$p2+$p3+$p4+$p5+$p6+$p7)</td>
                                    <td></td>
                                    <td>
                                        {{-- <a href="/custom/product7/{{ $wo->id }}/{{ $wo->product7 }}" class="genric-btn danger circle arrow">Hapus</a> --}}
                                    </td>
                                </tr>

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <div class="row align-items-end justify-content-center">
                @if ($wo->product1)
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Lanjutkan
                    </button>
                @else
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Lanjutkan
                    </button>
                @endif
            </div>

            <!-- Modal -->
            <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="/custom/create-nama/{{ $wo->id }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('put')
                            <x-custom-input field="nama" label="Nama Paket" type="text"/>
                            <x-custom-input field="keterangan" label="Keterangan" type="text"/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Maaf Product Menu Feelight Moment adalah enu wajib dan kamu memilihnya.
                        <br>
                        <hr>
                        <div class="row align-items-end justify-content-center">
                            <a href="/paket-custom/create" class="btn card-btn1">Pilih Sekarang</a>
                        </div>
                    </div>
                    {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </div>
                </div>
            </div>
            {{-- modal --}}
        </section>
    @include('user.component.registry')
    @include('user.component.galery2')
    @include('user.component.footer')
 @endsection
