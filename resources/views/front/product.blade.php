@extends('front.layouts.app')

@push('css_after')

@endpush

@push('meta_tags')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $product->translation(current_locale())->title }}"/>
    <meta property="og:image" content="https://www.socializertravel.com/images/cropins-bck.png"/>
    <meta property="og:site_name" content="Socializer - Croatian Clubs, Bars, Food and Fun"/>
    <meta property="og:url" content="https://www.socializertravel.com/"/>
    <meta property="og:description" content="{{ $product->translation(current_locale())->meta_description }}"/>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:title" content="{{ $product->translation(current_locale())->meta_title }}" />
    <meta name="twitter:description" content="{{ $product->translation(current_locale())->meta_description }}" />
    <meta name="twitter:image" content="https://www.socializertravel.com/images/cropins-bck.png" />
@endpush

@section('content')
    <div id="wrapper">
        <!--  content-->
        <div class="content">
            <!--  carousel-->
            <div class="list-single-carousel-wrap fl-wrap" id="sec1">
                <div class="fw-carousel fl-wrap full-height lightgallery">
                    @foreach  ($product->images()->get() as $image)
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item">
                            <div class="box-item">
                                <img src="{{$image->image}}" alt="{{$image->translation()->title}}">
                                <a href="{{$image->image}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                            </div>
                        </div>
                        <!-- slick-slide-item end -->
                    @endforeach
                </div>
                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
            </div>
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="act-scrlink" href="#sec1">{{ __('front/apartment.gallery') }}</a></li>
                            <li><a href="#sec2">{{ __('front/apartment.about') }}</a></li>
                            <li><a href="#sec3">{{ __('front/apartment.menu') }}  </a></li>
                            <li><a href="#sec5">{{ __('front/apartment.reserve') }}</a></li>
                            <li><a href="#sec4">{{ __('front/apartment.directions') }}</a></li>
                        </ul>
                    </nav>
                   {{--  <a href="#" class="save-btn"> <i class="fa fa-heart"></i> Save </a> --}}
                </div>
            </div>
            <!--  section   -->
            <section class="gray-section no-top-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            @php($cat =collect(config('settings.categories'))->get($product->category))
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="breadcrumbs gradient-bg  fl-wrap"><a href="{{ route('index') }}">{{ __('front/apartment.home') }}</a><a href="#">{{$cat[current_locale()] }}</a><span> {{ $product->translation(current_locale())->title }} </span></div>
                                <!-- list-single-header -->
                                <div class="list-single-header list-single-header-inside fl-wrap" style="margin-bottom:20px">
                                    <div class="container">
                                        <div class="list-single-header-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="list-single-header-item-opt fl-wrap">
                                                        <div class="list-single-header-cat fl-wrap">
                                                            <a href="#">{{$cat[current_locale()] }}</a>
                                                        </div>
                                                    </div>
                                                    <h2> {{$image->translation()->title}} </h2>
                                                    <span class="section-separator"></span>

                                                </div>
                                            {{--    <div class="col-md-4">
                                                    <div class="fl-wrap list-single-header-column">
                                                        <span class="viewed-counter"><i class="fa fa-eye"></i> Viewed -  156 </span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>{{ __('front/apartment.about') }}</h3>
                                    </div>
                                    {!! $product->translation(current_locale())->description !!}
                                </div>
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>{{ __('front/apartment.menu') }}</h3>
                                    </div>
                                    <div class="iframe-holder fl-wrap">
                                        <div class="accordion">
                                            @foreach ($menu as $key => $group)
                                                <a class="toggle @if ($loop->first) act-accordion @endif" href="#"> {{ $key}}<i class="fa fa-angle-down"></i></a>
                                                <div class="accordion-inner  @if ($loop->first) visible @endif">
                                                    <div class="opening-hours">
                                                      <ul>
                                                            @foreach ($group as $item)
                                                              <li><span class="opening-hours-day">{{ $item['title'][current_locale()] }} </span><span class="opening-hours-time">{{ $item['price'] }} €</span></li>
                                                            @endforeach
                                                        </ul>


                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- list-single-main-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap" id="sec4">
                                    <div class="box-widget-item-header">
                                        <h3>{{ __('front/apartment.directions') }} </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="map-container">
                                            <div id="singleMap" data-latitude="{{$product->lat}}" data-longitude="{{$product->lon}}" data-mapTitle="Our Location"></div>
                                        </div>
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i class="fa fa-map-marker"></i> {{ __('front/apartment.address') }}:</span> <a href="https://www.google.com/maps/search/?api=1&query={{ $product->translation(current_locale())->title }}+{{$product->street}}+{{$product->zip}}+{{$product->city}}, {{$product->country}}">{{$product->street}}, {{$product->zip}}, {{$product->city}}</a></li>
                                                    <li><span><i class="fa fa-phone"></i>{{ __('front/apartment.phone') }}: </span> <a href="#">{{$product->phone}}</a></li>
                                                    <li><span><i class="fa fa-globe"></i>{{ __('front/apartment.web') }}: </span> <a href="{{$product->web}}">{{$product->web}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="list-widget-social">
                                                <ul>
                                                    @if($product->facebook)
                                                        <li><a href="{{$product->facebook}}" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                                                    @endif

                                                    @if($product->instagram)
                                                        <li><a href="{{$product->instagram}}" target="_blank" ><i class="fa fa-instagram"></i></a></li>
                                                    @endif

                                                   {{--<li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            @include('front.layouts.partials.session')
                            <div class="box-widget-wrap">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap" id="sec5">
                                    <div class="box-widget-item-header">
                                        <h3>{{ __('front/apartment.reserve_online') }} </h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                            <form action="{{ route('poruka') }}" class="add-comment custom-form" method="POST">
                                                @csrf
                                                <fieldset>
                                                    <label><i class="fa fa-user-o"></i></label>
                                                    <input type="text" placeholder="{{ __('front/apartment.your_name') }}" name="name"/>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fa fa-envelope-o"></i>  </label>
                                                    <input type="text" placeholder="{{ __('front/apartment.email_address') }}" name="email"/>
                                                    <div class="quantity fl-wrap">
                                                        <span><i class="fa fa-user-plus"></i>{{ __('front/apartment.persons') }} </span>
                                                        <div class="quantity-item">
                                                            <input type="button" value="-" class="minus">
                                                            <input type="text" name="quantity" title="{{ __('front/apartment.qty') }}" class="qty" min="1" max="3" step="1" value="1">
                                                            <input type="button" value="+" class="plus">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><i class="fa fa-calendar-check-o"></i>  </label>
                                                            <input type="text" name="date" placeholder="{{ __('front/apartment.date') }}" class="datepicker" data-large-mode="true" data-large-default="true" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fa fa-clock-o"></i>  </label>
                                                            <input type="text" name="time" placeholder="{{ __('front/apartment.time') }}" class="timepicker" value="12:00 am"/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" name="message" placeholder="{{ __('front/apartment.additional_info') }}"></textarea>
                                                    <input type="hidden" name="listing_email" value="{{ $product->email }}">

                                                    <input type="hidden" name="recaptcha" id="recaptcha">


                                                </fieldset>
                                                <button type="submit" class="btn big-btn color-bg flat-btn book-btn">{{ __('front/apartment.book_now') }}<i class="fa fa-angle-right"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>{{ __('front/apartment.working_hours') }}</h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                         {{--   <span class="current-status"><i class="fa fa-clock-o"></i> Now Open</span>--}}
                                            <ul>
                                                @foreach (json_decode($product->working_hours) as $day)
                                                    <li><span class="opening-hours-day">  {{ $day->title->{current_locale()} }}</span><span class="opening-hours-time">{{ $day->open }} h - {{ $day->close }} h</span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!--box-widget-wrap end -->
                    </div>
                </div>
            </section>
            <!--  section  end-->
            <div class="limit-box fl-wrap"></div>
        </div>
        <!--  content  end-->
    </div>
@endsection
@push('js_after')
    <script type="text/javascript" src="{{ asset('js/map.js') }}"></script>
    @include('front.layouts.partials.recaptcha-js')
@endpush
