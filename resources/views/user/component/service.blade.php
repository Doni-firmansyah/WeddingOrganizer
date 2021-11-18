 <!--? Services Start -->
 <section class="pricing-card-area section-padding30 section-bg" data-background="wedding/assets/img/gallery/section_bg1.png">
    <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70">
                    <h2>Wedding Service</h2>
                    <img src="wedding/assets/img/gallery/tittle_img.png" alt="">
                    <p>Rayakan pernikahan impian anda bersama kami, dengan beragam paket pernikahan lengkap (all in) beserta bonus-bonus yang kami sediakan, kami akan mewujudkan pernikahan impian anda menjadi kenyataan dan membuat pernikahan anda menjadi sangat berkesan.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card text-center mb-30">
                    <div class="card-top">
                        <span class="flaticon-chart"></span>
                        <h4>Paket Undangan</h4>
                    </div>
                    <div class="card-bottom">
                        <ul>
                            <li  class="font-weight-bold" style="color: goldenrod"><i class="fa fa-angle-double-right"></i>Bebas Biaya</li>
                            <li><i class="fa fa-angle-double-right"></i>Desain Kekinian</li>
                            <li><i class="fa fa-angle-double-right"></i>Proses Cepat</li>
                            <li><i class="fa fa-angle-double-right"></i>Mudah Disebar</li>
                            <li><i class="fa fa-angle-double-right"></i>Praktis</li>
                        </ul>
                    </div>
                    <div class="card-buttons mt-30">
                        <a href="/paket-undangan" class="btn card-btn1">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card active text-center mb-30">
                    <div class="card-top">
                        <span class="flaticon-project"></span>
                        <h4>Paket WO</h4>
                    </div>
                    <div class="card-bottom">
                        <ul>
                            <li class="font-weight-bold" style="color: goldenrod"><i class="fa fa-angle-double-right"></i>Save Time</li>
                            <li><i class="fa fa-angle-double-right"></i>Profesional Team</li>
                            <li><i class="fa fa-angle-double-right"></i>Best Service</li>
                            <li><i class="fa fa-angle-double-right"></i>Praktis</li>
                            <li><i class="fa fa-angle-double-right"></i>Hemat Biaya</li>
                        </ul>
                    </div>
                    <div class="card-buttons mt-30">
                        <a href="/paket-wo" class="btn card-btn1">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card text-center mb-30">
                    <div class="card-top">
                        <span class="flaticon-award"></span>
                        <h4>Custom Paket</h4>
                    </div>
                    <div class="card-bottom">
                        <ul>
                            <li class="font-weight-bold" style="color: goldenrod"><i class="fa fa-angle-double-right"></i>Custom Sesuai Keinginan Anda</li>
                            <li><i class="fa fa-angle-double-right"></i>Profesional Team</li>
                            <li><i class="fa fa-angle-double-right"></i>Best Service</li>
                            <li><i class="fa fa-angle-double-right"></i>Praktis</li>
                            <li><i class="fa fa-angle-double-right"></i>Hemat Biaya & Fleksibel</li>
                        </ul>
                    </div>
                    <div class="card-buttons mt-30">
                        <a href="#" class="btn card-btn1">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
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
<!-- Services Card End -->
