@extends('front.layouts.app')

@push('css_after')

@endpush

@push('meta_tags')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $page->translation(current_locale())->title }}"/>
    <meta property="og:image" content="https://cropins.agmedia.rocks/images/cropins-bck.png"/>
    <meta property="og:site_name" content="CroPins - Croatian Clubs, Bars, Food and Fun"/>
    <meta property="og:url" content="https://www.cropins.hr/"/>
    <meta property="og:description" content="{{ $page->translation(current_locale())->meta_description }}"/>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:title" content="{{ $page->translation(current_locale())->meta_title }}" />
    <meta name="twitter:description" content="{{ $page->translation(current_locale())->meta_description }}" />
    <meta name="twitter:image" content="https://cropins.agmedia.rocks/images/cropins-bck.png" />
@endpush

@section('content')
    <div id="wrapper">
        <!--  content-->
        <div class="content">

            <section class="parallax-section" data-scrollax-parent="true" id="sec1">
                <div class="bg par-elem "  data-bg="{{ asset('media/bck.png') }}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title center-align " style="padding-bottom:0px">
                        <h1><span>{{ $page->translation(current_locale())->title }}</span></h1>
                        <div class="breadcrumbs fl-wrap"><a href="{{ route('index') }}">{{ __('front/apartment.home') }}</a><span> {{ $page->translation(current_locale())->title }}</span></div>

                    </div>
                </div>

            </section>

            <section  id="sec2">
                <div class="container">

                    <!--about-wrap -->
                    <div class="about-wrap">
                        <div class="row">

                            <div class="col-md-12">

                                {!! $page->translation(current_locale())->description !!}

                            </div>
                        </div>
                        <!-- about-wrap end  -->

                        <!-- features-box-container -->

                        <!-- features-box-container end  -->
                    </div>
                </div>
            </section>

        </div>
        <!--  content  end-->
    </div>
@endsection
@push('js_after')

@endpush
