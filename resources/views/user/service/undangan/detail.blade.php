 <!--? Services Start -->

 <section class="pricing-card-area section-padding30 section-bg" data-background="/wedding/assets/img/gallery/section_bg1.png">
    <div class="container">
        <div class="row align-items-center justify-content-between padding-130">

            <div class="col-lg-5 col-md-6 ml-6">
                <div class="watch-details mb-40 text-center">
                    <h2>{{ $undangan->nama }}</h2>
                    <img src="/wedding/assets/img/gallery/tittle_img.png" alt="">
                </div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <td scope="col">Nama</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $undangan->nama }}</td>
                      </tr>
                      <tr>
                        <td scope="col">Maksimal Pengerjaan</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $undangan->lama_pengerjaan }} Hari</td>
                      </tr>
                      <tr>
                        <td scope="col">Harga</td>
                        <td scope="col">:</td>
                        <td scope="col">@currency($undangan->harga)</td>
                      </tr>
                      <tr>
                        <td scope="col">Bintang</td>
                        <td scope="col">:</td>
                        <td scope="col">@for ($i = 0; $i < 5; ++$i)
                                                <i class="fa fa-star{{ $undangan->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                                            @endfor</td>
                      </tr>
                      <tr>
                        <td scope="col">Keterangan</td>
                        <td scope="col">:</td>
                        <td scope="col">{{ $undangan->keterangan}}</td>
                      </tr>
                  </table>
                  {{-- nanti if --}}


                  @if (  $wo > $undangans )

                    <button type="button" class="btn danger circle arrow" data-toggle="modal" data-target="#exampleModal">
                        Pesan
                    </button>
                  @else
                    <button type="button" class="btn danger circle arrow" data-toggle="modal" data-target="#exampleModalCenter">
                        Pesan
                    </button>
                  @endif

                  {{-- <a href="/pesan/{{ $undangan->keterangan_paket}}/{{ $undangan->id}}" class="btn">Pesan</a> --}}

            </div>
            <div class="col-lg-6 col-md-6 col-sm-10">
                <div class="choice-watch-img mb-40">
                    {{-- <img src="/image/{{ $undangan->gambar }}" alt=""> --}}
                    {{-- slider --}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" width="370" height="430">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="/image/{{ $undangan->gambar }}" alt="First slide" width="370" height="480">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="/image/{{ $undangan->gambar2 }}" alt="Second slide" width="370" height="480">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="/image/{{ $undangan->gambar3 }}" alt="Third slide" width="370" height="480">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>
        </div>
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
            <form action="/pesan-undangan/{{ $undangan->keterangan_paket}}/{{ $undangan->id }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <x-custom-input field="tglacara" label="Tanggal Acara" type="date"/>
                <x-custom-input field="namapria" label="Nama Mempelai Pria" type="text"/>
                {{-- <x-custom-input field="ttlpria" label="Tempat Dan Tanggal Lahir Pria" type="text"/> --}}
                <x-custom-input field="namaayahpria" label="Nama Ayah Dari Mempelai Pria" type="text"/>
                <x-custom-input field="namaibupria" label="Nama Ibu Dari Mempelai Pria" type="text"/>
                <x-custom-input field="namawanita" label="Nama Mempelai wanita" type="text"/>
                {{-- <x-custom-input field="ttlwanita" label="Tempat Dan Tanggal Lahir wanita" type="text"/> --}}
                <x-custom-input field="namaayahwanita" label="Nama Ayah Dari Mempelai wanita" type="text"/>
                <x-custom-input field="namaibuwanita" label="Nama Ibu Dari Mempelai wanita" type="text"/>
                <x-custom-input field="alamatacara" label="Alamat Lokasi Acara" type="text"/>
                <x-custom-input field="note" label="Note.?" type="text"/>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="genric-btn danger circle arrow" data-dismiss="modal">Close</button>
          <a href="/pesan-undangan/{{ $undangan->keterangan_paket}}/{{ $undangan->id}}" class="genric-btn info circle arrow">Pesan</a>
        </div> --}}
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Feelight.ID</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Maaf, Desain Undangan Gratis Tersedia hanya Untuk Orang yang sudah memesan Paket Wedding Organizer Feeligt.ID.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="genric-btn danger circle arrow" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</section>
<!-- Services Card End -->
