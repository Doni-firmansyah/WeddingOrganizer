<section class="pricing-card-area section-padding30 section-bg" data-background="wedding/assets/img/gallery/section_bg1.png">
    <div class="container">
            <!-- Section Tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70">
                    <h2>Paket Wedding Organizer</h2>
                    <img src="wedding/assets/img/gallery/tittle_img.png" alt="">
                    <p>Kami menyediakan paket Organizer yang akan membantumu dalam acara spesialmu dari Konsultasi hingga Eksekusi yang pastinya akan memudahkanmu.</p>

                </div>
            </div>
        </div>



        <div class="row align-items-end">
            @foreach ($paketwos as $paketwo )
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card text-center mb-30" >
                    <div class="card-top">
                        <span class="flaticon-award"></span>
                        <h4>{{$paketwo->nama}}</h4>
                    </div>
                    <div class="card-bottom" style="min-height: 274px">
                        <ul>
                            {{-- @foreach ( $paketwo->vendors as $tag)
                                <li><i class="far fa-clock"></i>{{ $tag->categorys}}</li>
                            @endforeach --}}

                            @if($paketwo->product1=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product1)->value('categorys')}}</li>@endif
                            @if($paketwo->product2=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product2)->value('categorys')}}</li>@endif
                            @if($paketwo->product3=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product3)->value('categorys')}}</li>@endif
                            @if($paketwo->product4=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product4)->value('categorys')}}</li>@endif
                            @if($paketwo->product5=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product5)->value('categorys')}}</li>@endif
                            @if($paketwo->product6=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $paketwo->product6)->value('categorys')}}</li>@endif

                        </ul>
                    </div>
                    <div class="card-buttons mt-30">
                        <a href="/paket-wo/{{$paketwo->id}}" class="btn card-btn1">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- calender --}}
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card-header text-center">
                    <h4 class="card-title text-uppercase">Jadwal Kegiatan Feelight.ID</h4>
                </div>
                <nav class="navbar navbar-light bg-light col-lg-12">
                    <form class="form-inline bg-light col-lg-12" action="/ketersediaan/cek" method="get" enctype="multipart/form-data">
                        @csrf
                    <input class="form-control mr-sm-2 col-lg-9" type="date" format="dd/mm/yyyy" name="cek" value="{{ old("cek") }}">

                    <button class="genric-btn danger circle arrow" type="submit">Cek Jadwal</button>
                    </form>
                </nav>
                <div class="row pl-3 pr-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $ketersediaan as $cek)
                                <tr>
                                    <th>{{ \Carbon\Carbon::parse($cek->tgl_acara)->format('d-M-Y') }}</th>
                                    <th style="color: red">Jadwal Penuh</th>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    {{$ketersediaan->links("pagination::bootstrap-4")}}
                </div >
            </div>
        </div>
    </div>
</section>
