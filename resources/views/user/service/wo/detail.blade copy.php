 <!--? Services Start -->

 <section class="pricing-card-area section-padding10 section-bg" data-background="/wedding/assets/img/gallery/section_bg1.png">
    <div class="container pb-5">
        <div class="row d-flex justify-content-center pt-5">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70">
                    <h2>Detail Paket</h2>
                    <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between padding-130">

            <div class="col-lg-5 col-md-6 ml-6">
                <div class="watch-details mb-40 text-center">
                    <h2>{{ $wo->nama }}</h2>
                    <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                </div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <td scope="col">Nama</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $wo->nama }}</td>
                      </tr>
                      <tr>
                        <td scope="col">Harga</td>
                        <td scope="col">:</td>
                        <td scope="col">   {{ $wo->harga}}</td>
                      <tr>
                        <td scope="col">Bintang</td>
                        <td scope="col">:</td>
                        <td scope="col">
                            @for ($i = 0; $i < 5; ++$i)
                                                <i class="fa fa-star{{ $wo->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                                            @endfor</td>
                      </tr>
                      <tr>
                        <td scope="col">Keterangan</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $wo->keterangan}}</td>
                      </tr>
                      @if($wo->product1=="")
                      @else()
                            <tr>
                                <td scope="col">Weding Organizer</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product1}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product1)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                      @if($wo->product2=="")
                      @else()
                            <tr>
                                <td scope="col">Gedung</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product2}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product2)->value('nama_product'); }}</a>
                                </td>
                              </tr>
                            @endif
                      @if($wo->product3=="")
                      @else()
                            <tr>
                                <td scope="col">Katering</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product3}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product3)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product4=="")
                    @else()
                            <tr>
                                <td scope="col">Riasan</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product4}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product4)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product5=="")
                    @else()
                            <tr>
                                <td scope="col">Dekor</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product5}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product5)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product6=="")
                    @else()
                            <tr>
                                <td scope="col">Hiburan</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product6}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product6)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product7=="")
                    @else()
                            <tr>
                                <td scope="col">Lain-lain</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#modal-default-{{ $wo->product7}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product7)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                  </table>
                <a href="/pesan/{{ $wo->keterangan_paket}}/{{ $wo->id}}" class="btn">Pesan</a>
                {{-- modal --}}

                  @foreach ( $details as $detail)
                  <div class="modal fade mt-5" id="modal-default-{{ $detail->vendor_id }}">
                    <div class="modal-dialog mt-5">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="card ">
                                    <div class="card-header ">
                                      <h4 class="card-title text-uppercase">{{DB::table('vendors')->where('id', $detail->vendor_id)->value('nama_product'); }}</h4>
                                    </div>

                                    <div class="card-footer ">
                                      {{-- <div class="legend">
                                        <img src="/image/{{DB::table('vendors')->where('id', $detail->vendor_id)->value('gambar'); }}"alt="Card image cap" style="width: 100%">
                                      </div> --}}


                                    <hr>
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <td scope="col">Nama Product</td>
                                            <td scope="col">:</td>
                                            <td scope="col">{{DB::table('vendors')->where('id', $detail->vendor_id)->value('nama_product'); }}</td>
                                          </tr>
                                          <tr>
                                            <td scope="col">harha</td>
                                            <td scope="col">:</td>
                                            <td scope="col">{{DB::table('vendors')->where('id', $detail->vendor_id)->value('harga'); }}</td>
                                          </tr>
                                          <tr>
                                            <td scope="col">keterangan</td>
                                            <td scope="col">:</td>
                                            <td scope="col">{{DB::table('vendors')->where('id', $detail->vendor_id)->value('keterangan'); }}</td>
                                          </tr>
                                          <tr>
                                            <td scope="col">By</td>
                                            <td scope="col">:</td>
                                            @php
                                                $id=DB::table('vendors')->where('id', $detail->vendor_id)->value('user_id');
                                            @endphp
                                            <td scope="col">{{DB::table('users')->where('id', $id)->value('nama_vendor'); }}</td>
                                          </tr>
                                      </table>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  @endforeach

            </div>
            <div class="col-lg-6 col-md-6 col-sm-10">
                <div class="choice-watch-img mb-40">
                    <img src="/image/{{ $wo->gambar }}" alt="" class = "img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </div>

</div>
</section>
<!-- Services Card End -->
