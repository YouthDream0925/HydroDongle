@extends('layouts.front.index')

@push('css')
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
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">
                                @if(request()->is('agents/0'))
                                    {{ __('global.dongleAgents') }}
                                @elseif(request()->is('agents/1'))
                                    {{ __('global.licenceAgents') }}
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="p-top-100">
    <section class="form-wrapper contact--from5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-wrapper">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-2 col-md-6 m-bottom-30">
                                </div>
                                <div class="col-lg-4 col-md-6 m-bottom-30">
                                    <input id="country_name" type="text" placeholder="Country" class="form-control" required>
                                </div>
                                <div class="col-lg-4 col-md-6 m-bottom-30">
                                    <input id="reseller_name" type="text" placeholder="Agent" class="form-control" required>
                                </div>
                            </div>
                        </form>
                    </div><!-- end: .form-wrapper -->
                </div>
            </div>
        </div>
    </section><!-- ends: .form-wrapper -->
</section><!-- ends: section -->
<section class="p-top-50 p-bottom-50">
    <div class="address-blocks">
        <div class="container">
            <div class="row">
                @foreach($resellers_country as $country)
                <div class="col-lg-3 col-md-6 resellers-container" data-resllers="{{ $country->reseller_names }}" data-country="{{ $country->country }}">
                    <div class="adress p-0">
                        <div style="width: 100px; height: 100px; margin-left: auto; margin-right: auto;">
                            <img class="img-fluid img-responsive-cover rounded-circle" src="{{ asset('vendor/blade-flags/country-') }}{{strtolower($country->alpha_2)}}.svg"/>
                        </div>
                        <p class="nam">
                            <a href="#" class="collapsed" data-toggle="collapse" data-target="#accordion_four_collapse_{{$country->id}}" aria-expanded="false" aria-controls="accordion_four_collapse_{{$country->id}}">
                                {{ $country->country }}
                            </a>
                        </p>
                        <p><i class="la la-user"></i> {{ __('global.resellers') }} : {{ count($country->resellers) }}</p>
                        <div class="accordion-single">
                            <div id="accordion_four_collapse_{{$country->id}}" class="collapse" aria-labelledby="accordion_four_heading4" data-parent="#accordion_four">
                                @foreach($country->resellers as $reseller)
                                <div class="accordion-contents mb-2" style="background: whitesmoke;">
                                    <p>{{ $reseller->name }}</p>
                                    @if($reseller->email != null)
                                    <p><a href="mailto:{{ $reseller->email }}"><i class="la la-mail-bulk"></i> {{ $reseller->email }}</a></p>
                                    @endif
                                    @if($reseller->website != null)
                                    <a href="{{ $reseller->website }}" target="_blank"><i class="la la-sitemap"></i> {!! Str::of($reseller->website)->limit(20); !!}</a>
                                    @endif
                                    @if($reseller->tel != null)
                                    <p><i class="la la-phone"></i> {{ $reseller->tel }}</p>
                                    @endif
                                    @if($reseller->whatsapp != null)
                                    <p><i class="la la-whatsapp"></i> {{ $reseller->whatsapp }}</p>
                                    @endif
                                    @if($reseller->facebook != null)
                                    <p><i class="la la-facebook"></i> {{ $reseller->facebook }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div><!-- End: .collapse -->
                        </div><!-- Ends: .accordion-single -->
                    </div>
                </div><!-- ends: .col-lg-3 -->
                @endforeach
            </div>
        </div><!-- ends: .container -->
    </div><!-- ends: .address-blocks -->
</section><!-- ends: section -->
@endsection

@push('script')
<script>
    $(document).ready(function(){
        $("#reseller_name").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('#country_name').val('');
            $(".resellers-container").filter(function() {
                let names = $(this).attr('data-resllers');
                $(this).toggle(names.search(value) > -1)
            });
        });

        $("#country_name").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $('#reseller_name').val('');
            $(".resellers-container").filter(function() {
                let names = $(this).attr('data-country');
                names = names.toLowerCase();
                $(this).toggle(names.search(value) > -1)
            });
        });
    });
</script>
@endpush