<div class="row mb-4">
    <div class="col-md-12">
        <div class=" p-2 px-3">
            {{-- <div class="d-flex flex-row justify-content-between align-items-center order">
                <div class="d-flex flex-column order-details"><span>Your order has been delivered</span><span class="date">by DHFL on 21 Jan, 2020</span></div>
                <div class="tracking-details"><button class="btn btn-outline-primary btn-sm" type="button">Track order details</button></div>
            </div> --}}
            {{-- <hr class="divider mb-4"> --}}
            {{-- <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column align-items-start"><span>Menu</span><span>Order placed</span></div>
                <div class="d-flex flex-column justify-content-center"><span>Menu</span><span>Order placed</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>Menu</span><span>Order Dispatched</span></div>
                <div class="d-flex flex-column align-items-center"><span>Menu</span><span>Out for delivery</span></div>
                <div class="d-flex flex-column align-items-end"><span>Menu</span><span>Delivered</span></div>
            </div> --}}




            <div class="d-flex flex-row justify-content-between align-items-center align-content-center"><a href="/paket-custom/create"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('paket-custom/create*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('paket-custom/create*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-2/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-2*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-2*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-3/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-3*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-3*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-4/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-4*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-4*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-5/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-5*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-5*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-6/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-6*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-6*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-step-7/{{ $field }}"><span class="flex-fill track-line"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-step-7*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-step-7*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
                <hr class="flex-fill track-line"><a href="/custom/create-nama/{{ $field }}"><span class="d-flex justify-content-center align-items-center dot {{ (request()->is('custom/create-nama*')) ? 'big-dot' : '' }}"><i class="{{ (request()->is('custom/create-nama*')) ? 'fa fa-check text-white' : '' }}"></i></span></a>
            </div>


            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-column align-items-start"><span>Menu</span><span>Feelight</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>Menu</span><span>Gedung</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>Menu</span><span>Katering</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>Menu</span><span>Riasan</span></div>
                <div class="d-flex flex-column justify-content-center align-items-center"><span>Menu</span><span>Dekor</span></div>
                <div class="d-flex flex-column align-items-center"><span>Menu</span><span>Hiburan</span></div>
                <div class="d-flex flex-column align-items-center"><span>Menu</span><span>Lain-Lain</span></div>
                <div class="d-flex flex-column align-items-end"><span>Validasi</span><span>Paket</span></div>
            </div>
        </div>
    </div>
</div>
