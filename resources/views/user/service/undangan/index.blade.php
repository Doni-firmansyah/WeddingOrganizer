<section class="pricing-card-area section-padding30 section-bg" data-background="wedding/assets/img/gallery/section_bg1.png">
    <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-70">
                    <h2>Undangan</h2>
                    <img src="wedding/assets/img/gallery/tittle_img.png" alt="">
                    <p>Buat dan bagikan undangan pernikahan kamu dengan berbagai pilihan tampilan undangan yang kekinian, membuat pernikahanmu makin berkesan dengan berbagai macam desain undangan yang menarik.</p>
                </div>
            </div>
        </div>



        <div class="row align-items-end">
            @foreach ( $undangans as $undangan )
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-card text-center mb-30">
                    <div class="card-top">
                        {{-- <span class="flaticon-award"></span> --}}
                        <img src="/image/{{ $undangan->gambar}}" alt="" width="100%">

                    </div>
                    <div class="card-bottom">
                        <ul>
                            <li> @for ($i = 0; $i < 5; ++$i)
                                <i class="fa fa-star{{ $undangan->bintang <= $i ? '-o' : '' }}" aria-hidden="true" style="color:gold"></i>
                                @endfor
                            </li>
                            <li><i class="fa fa-check-square"></i>Template Premium</li>
                            <li><i class="fa fa-check-square"></i> Maksimal Pengerjaan {{$undangan->lama_pengerjaan}} hari </li>
                            <li><i class="fa fa-check-square"></i>Biaya Service Rp.{{$undangan->harga}}</li>
                        </ul>
                    </div>
                    <div class="card-buttons mt-30">
                        <a href="/paket-undangan/{{$undangan->id}}" class="btn card-btn1">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>
