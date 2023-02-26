@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/style.css" rel="stylesheet" />
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/breadbg.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.profile') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="contact--four">
    <div class="container p-top-100 p-bottom-110">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-wrapper">
                        <div class="m-bottom-10">
                            <div class="divider divider-simple text-left">
                                <h3>{{ __('global.myInfo') }}</h3>
                            </div>
                        </div>
                        <p class="m-bottom-30">Investiga tiones demonstr averunt lectres legere me lius quod ii qua legunt saepius larias est etiam pro cessus.</p>
                        <div class="form-group">
                            <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><!-- end: .form-wrapper -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6">
                    <div class="m-bottom-25">
                        <div class="divider divider-simple text-center">
                            <h3>{{ __('global.myPhoto') }}</h3>
                        </div>
                    </div>
                    <div class="align-items-md-start align-items-center flex-column flex-md-row">
                        <div class="text-center">
                            @if($user->hasMedia('user_avatar'))
                            <img id="avatar_container" src="{{ $user->getMedia('user_avatar')->first()->getUrl() }}" width="160" height="160" title="avatar" class="rounded-4">
                            @else
                            <img id="avatar_container" src="{{ asset('theme_front/img/person/male.png') }}" width="160" height="160" title="avatar" class="rounded-4">
                            @endif
                        </div>
                        <div class="media-body ms-md-5 m-0 mt-4 mt-md-0 text-md-start text-center">
                            <h4 class="mb-1">{{ $user->firstname }} {{ $user->lastname }}</h4>
                            <div class="my-3">
                                <input type="file" name="user_avatar" id="user_avatar" hidden/>
                                <label class="btn btn-primary" for="user_avatar">{{ __('global.photo') }}</label>
                            </div>
                        </div>
                    </div>
                    @if($user->isactivated == '1')
                    <div class="quotes-wrapper blockquote--one">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- start blockquote -->
                                    <blockquote class="blockquote blockquote3">
                                        <div class="quote-author" style="margin-top: 0 !important;">
                                            <p><span>{{ $user->getDateTimeActivatedAtAttribute() }}</span> ~ <span>{{ $user->getDateTimeExpiredAtAttribute() }}</span></p>
                                            @if($user->isExpired())
                                            <span class="badge bg-danger">EXPIRED</span>
                                            @else
                                            <span class="badge bg-success">ACTIVATED</span>
                                            @endif
                                        </div>
                                    </blockquote><!-- end: blockquote -->
                                </div>
                            </div>
                        </div>
                    </div><!-- ends: .quotes-wrapper -->
                    @endif
                </div><!-- ends: .col-lg-6 -->
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <button class="btn btn-primary">{{ __('global.submit') }}</button>
                </div>
            </div>            
        </form>
    </div>        
</section><!-- ends: .contact--four -->
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/js/main.nocss.js" crossorigin="anonymous"></script>
<script src="{{ asset('theme/js/litepicker.js') }}"></script>
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script type="module">
    import toast from '{{ asset("theme_front/custom/js/toast.js") }}';
    @if ($message = Session::get('success'))
        toast('success', '{{ $message }}');
    @endif

    jQuery(document).ready(function($) {
        FileLoader.init('user_avatar', 'avatar_container');
    });
</script>
@endpush