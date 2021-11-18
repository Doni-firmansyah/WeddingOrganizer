<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="/wedding/assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html"><img src="/wedding/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="list-inline">
                                        <li><a href="/" @if (request()->is('/'))style="color: red"@endif> home</a></li>
                                        <li><a href="/paket-undangan" @if (request()->is('paket-undangan'))style="color: red"@endif>Paket Undangan</a></li>
                                        <li><a href="/paket-wo" @if (request()->is('paket-w*'))style="color: red"@endif >Paket WO</a></li>
                                        <li><a href="/paket-custom"@if (request()->is('paket-custom'))style="color: red"@endif>custom paket</a></li>

                                        @auth
                                            <li><a href="#" @if (request()->is('vendo*'))style="color: red"@endif>Vendor</a>
                                                <ul class="submenu"  >
                                                    @if (DB::table('users')->where('id', Auth::user()->id)->value('nama_vendor')=="")
                                                        <li><a href="/user/daftar/layanan/vendor/{{ Auth::user()->id }}">Daftar Layanan Vendor</a></li>
                                                    @else
                                                    <li><a href="/vendors">Layanan Vendor</a></li>
                                                    @endif

                                                </ul>
                                            </li>
                                        @else
                                        <li><a href="{{ route('login') }}">Vendor</a>

                                        </li>
                                        @endauth

                                            {{-- @dd( $data) --}}
                                        @auth
                                                @php
                                                // \Carbon\Carbon::parse($riwayat->tgl_acara)
                                                $now = \Carbon\Carbon::now();
                                                $null=0;
                                                $nows=10;
                                                $date=$now->addDays($nows);
                                                    $datas= DB::table('riwayats')->where('user_id',  Auth::user()->id)->where('status_pelunasan','1')->count();
                                                    $data = DB::table('riwayats')->where('user_id',  Auth::user()->id)->where('status_pelunasan',null)->count();
                                                    $jadi = $datas+$data;
                                                    $tgl = DB::table('riwayats')->where('status_pelunasan',null)->where('user_id',  Auth::user()->id)->where('tgl_acara' ,'<=', $date )->count();
                                                @endphp

                                            <li><a href="/user/detail/{{ Auth::user()->id }}" @if (request()->is('user/detail*'))style="color: red"@endif>~{{ Auth::user()->name }}</a>
                                                <ul class="submenu">
                                                    <li ><a href="/pesanan" >Pesanan</a></li>
                                                    <li><a href="/riwayat">
                                                        {{-- @dd($tgl) --}}
                                                        @if  ( $tgl>$null && $jadi>$null)
                                                            <span class="badge badge-danger navbar-badge"> <i class="fas fa-info"></i></span>
                                                        @else

                                                        @endif
                                                        History</a></li>
                                                    <li><a href="/logout">Logout</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}">Log in / Register</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Header End -->
</header>
