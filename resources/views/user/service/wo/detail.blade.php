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
                        <td scope="col">@currency($wo->harga)</td>
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
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product1}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product1)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                      @if($wo->product2=="")
                      @else()
                            <tr>
                                <td scope="col">Gedung</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product2}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product2)->value('nama_product'); }}</a>
                                </td>
                              </tr>
                            @endif
                      @if($wo->product3=="")
                      @else()
                            <tr>
                                <td scope="col">Katering</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product3}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product3)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product4=="")
                    @else()
                            <tr>
                                <td scope="col">Riasan</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product4}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product4)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product5=="")
                    @else()
                            <tr>
                                <td scope="col">Dekor</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product5}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product5)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product6=="")
                    @else()
                            <tr>
                                <td scope="col">Hiburan</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product6}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product6)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                    @if($wo->product7=="")
                    @else()
                            <tr>
                                <td scope="col">Lain-lain</td>
                                <td scope="col">:</td>
                                <td scope="col"><a href="#" data-target="#exampleModal-{{ $wo->product7}}" style="color: rgb(202, 193, 64)" data-toggle="modal">{{DB::table('vendors')->where('id', $wo->product7)->value('nama_product'); }}</a></td>
                              </tr>
                            @endif
                  </table>

                  <div class="row d-flex justify-content-center pt-5">
                    <a href="/pesan/{{ $wo->keterangan_paket}}/{{ $wo->id}}" class="btn danger">Pesan</a>
                  </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-10">
                <div class="choice-watch-img mb-40">
                    <img src="/image/{{ $wo->gambar }}" alt="" class = "img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ( $vendors as $vendor)
    <div class="modal fade mt-5" id="exampleModal-{{ $vendor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content mt-5">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            {{-- slider --}}
            <div id="carouselExampleIndicators{{ $vendor->id }}" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="0" class="active"></li>
                  @isset($vendor ->gambar2)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="1"></li>@endisset
                  @isset($vendor ->gambar3)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="2"></li>@endisset
                  @isset($vendor ->gambar4)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="3"></li>@endisset
                  @isset($vendor ->gambar5)<li data-target="#carouselExampleIndicators{{ $vendor->id }}" data-slide-to="4"></li>@endisset
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="/image/{{ $vendor -> gambar }}" alt="First slide">
                  </div>
                  @isset($vendor ->gambar2)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar2 }}" alt="Second slide">
                    </div>
                  @endisset
                  @isset($vendor ->gambar3)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar3 }}" alt="Second slide">
                    </div>
                  @endisset
                  @isset($vendor ->gambar4)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar4 }}" alt="Second slide">
                    </div>
                  @endisset
                  @isset($vendor ->gambar5)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/image/{{ $vendor -> gambar5 }}" alt="Second slide">
                    </div>
                  @endisset

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $vendor->id }}" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators{{ $vendor->id }}" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

              <hr>
            {{-- slider --}}
            {{-- teksbody --}}
            <div class="row d-flex justify-content-center pt-5">
                <h2>{{ $vendor ->nama_product }}</h2>
                <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
            </div>

            <div class="card-body mt-3">
                <div class="row row border-bottom">
                    <div class="col-4">
                    <p>Product By</p>
                    </div>
                    <div class="col-1">
                        <p> :</p>
                    </div>
                    <div class="col-7">
                        <p>{{ DB::table('users')->where('id', $vendor->user_id)->value('nama_vendor')}}</p>
                    </div>
                </div>
                <div class="row row border-bottom">
                    <div class="col-4">
                    <p>Instagram</p>
                    </div>
                    <div class="col-1">
                        <p> :</p>
                    </div>
                    <div class="col-7">
                        <p>{{ DB::table('users')->where('id', $vendor->user_id)->value('instagram_vendor');}}</p>
                    </div>
                </div>
            </div>

            <div class="card-body mt-3">
                <div class="row row border-bottom">
                    <div class="col-4">
                    <p> Nama Product</p>
                    </div>
                    <div class="col-1">
                        <p> :</p>
                    </div>
                    <div class="col-7">
                        <p>{{ $vendor ->nama_product }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-4">
                        <p>Category</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-7">
                        <p> {{ $vendor ->categorys }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-4">
                        <p>Harga</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-7">
                        <p> {{ $vendor ->harga }}</p>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-4">
                        <p> Keterangan</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-7">
                        <p>{{ $vendor ->keterangan }}</p>
                    </div>
                </div>
            </div>
             {{-- teksbody --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="genric-btn danger circle arrow" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endforeach
</section>
<!-- Services Card End -->
