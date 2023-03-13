@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/banners/contact-us.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.contactUs') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="contact--four">
    <div class="list-inline-wrapper p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="icon-list--three d-flex list--inline">
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-headphones"></i></span></div>
                            <div class="contents">
                                <h6>800 567.890.576</h6>
                                <span class="sub-text">Mon-Sat 8am - 18pm</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-envelope"></i></span></div>
                            <div class="contents">
                                <h6>{{ $super_admin->email }}</h6>
                                <span class="sub-text">Free enquiry</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-map-marker"></i></span></div>
                            <div class="contents">
                                <h6>Melbourne, Australia</h6>
                                <span class="sub-text">95 South Park Avenue</span>
                            </div>
                        </li>
                    </ul><!-- ends: .icon-list--three -->
                </div>
            </div>
        </div>
    </div><!-- ends: .list-inline -->
    <div class="container p-top-100 p-bottom-110">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-wrapper">
                    <div class="m-bottom-10">
                        <div class="divider divider-simple text-left">
                            <h3>Let&#39;s Get In Touch</h3>
                        </div>
                    </div>
                    <p class="m-bottom-30">Investiga tiones demonstr averunt lectres legere me lius quod ii qua legunt saepius larias est etiam pro cessus.</p>
                    <form name="send_problem" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        @if(Auth::check())
                        <input name="name" value="{{ Auth::user()->first_name }}" readonly type="text" class="form-control form-outline mb-4" placeholder="Name" required>
                        <input name="email" value="{{ Auth::user()->email }}" readonly type="email" class="form-control form-outline mb-4" placeholder="Email" required>
                        @else
                        <input name="name" value="" type="text" class="form-control form-outline mb-4" placeholder="Name" required>
                        <input name="email" value="" type="email" class="form-control form-outline mb-4" placeholder="Email" required>
                        @endif
                        <textarea name="content" class="form-control form-outline mb-4" placeholder="Messages" required></textarea>
                        <button id="btn-submit" class="btn btn-primary">Submit Now</button>
                    </form>
                    </div><!-- end: .form-wrapper -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6">
                    <div class="m-bottom-25">
                        <div class="divider divider-simple text-left">
                            <h3>Google Map</h3>
                        </div>
                    </div>
                    <div class="gmap2">
                        <div class="map" id="map3"></div><!-- end: .map -->
                    </div>
                </div><!-- ends: .col-lg-6 -->
            </div>
        </div>
    </section><!-- ends: .contact--four -->
@endsection

@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
<script src="{{ asset('theme_front/theme_assets/js/map.js') }}"></script>
<script type="module">
    import toast from '{{ asset("theme_front/custom/js/toast.js") }}';
    @if ($message = Session::get('success'))
        toast('success', '{{$message}}');
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            var message = "<?php echo $error; ?>";
            toast('error', message);
        @endforeach
    @endif

    $('#btn-submit').on('click', function() {
        var form =  $('form[name="send_problem"]');
        event.preventDefault();
        @if(Auth::check())
            form.submit();
        @else
            toast('error', 'Please log in first.');
        @endif
    });
</script>
@endpush