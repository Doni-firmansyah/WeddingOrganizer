<section class="pricing-card-area section-padding30 section-bg" data-background="wedding/assets/img/gallery/section_bg1.png">
    <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70">
                    <div class="card-buttons">
                        <a href="/paket-custom/create/nama_awal" class="btn card-btn1">Buat paket Custom</a>
                    </div>
                    <div class="mt-4">
                        <img src="wedding/assets/img/gallery/tittle_img.png" alt="">
                        <p>kami menyediakan paket wedding custom atau by request sesuai kebutuhan Anda sesuai dengan gaya, keinginan, dan mimpi-mimpi anda. Kreasikan ide-ide anda hingga menjadi nyata.</p>
                    </div>
                </div>
            </div>
        </div>




        <div class="row align-items-end">
            {{-- @dd($customs) --}}
            @foreach ($customs as $custom )
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card text-center mb-30" >
                    <div class="card-top">
                        <span class="flaticon-award"></span>
                        <h4>{{$custom->nama}}</h4>
                    </div>
                    <div class="card-bottom" style="min-height: 274px">
                        <ul>
                            @if($custom->product1=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product1)->value('categorys')}}</li>@endif
                            @if($custom->product2=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product2)->value('categorys')}}</li>@endif
                            @if($custom->product3=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product3)->value('categorys')}}</li>@endif
                            @if($custom->product4=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product4)->value('categorys')}}</li>@endif
                            @if($custom->product5=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product5)->value('categorys')}}</li>@endif
                            @if($custom->product6=="")  @else() <li><i class="fa fa-angle-double-right"></i>{{DB::table('vendors')->where('id', $custom->product6)->value('categorys')}}</li>@endif
                        </ul>
                    </div>
                    <div class="card-buttons mt-30" style="float: bottom">
                        <a href="/paket-wo/{{$custom->id}}" class="btn card-btn1">Detail</a>
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
                    <input class="form-control mr-sm-2 col-lg-9" type="date" format="dd/mm/yyyy" name="cek" value="{{ old('cek') }}">

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
