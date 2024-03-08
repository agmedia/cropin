@extends('front.layouts.app')

@push('css_after')

@endpush

@push('meta_tags')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="CroPins - Croatian Clubs, Bars, Food and Fun."/>
    <meta property="og:image" content="https://cropins.agmedia.rocks/images/cropins-bck.png"/>
    <meta property="og:site_name" content="CroPins - Croatian Clubs, Bars, Food and Fun"/>
    <meta property="og:url" content="https://www.cropins.hr/"/>
    <meta property="og:description" content="Croatian Clubs, Bars, Food and Fun. Where to go out in Croatia - a guide to nightlife in  Croatia."/>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:title" content="Croatian Clubs, Bars, Food and Fun. Where to go out in Croatia - a guide to nightlife in  Croatia." />
    <meta name="twitter:description" content="Croatian Clubs, Bars, Food and Fun. Where to go out in Croatia - a guide to nightlife in  Croatia." />
    <meta name="twitter:image" content="https://cropins.agmedia.rocks/images/cropins-bck.png" />
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
                            <img src="{{$image->image}}"   alt="{{$image->translation()->title}}">
                            <a href="{{$image->image}}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                        </div>
                    </div>

                    <!-- slick-slide-item end -->
                    @endforeach
                </div>
                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
            </div>
            <!--  section   -->
            <section class="gray-section no-top-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- list-single-main-wrapper -->
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">{{$product->category}}</a><span> {{ $product->translation(current_locale())->title }} </span></div>
                                <!-- list-single-header -->
                                <div class="list-single-header list-single-header-inside fl-wrap" style="margin-bottom:20px">
                                    <div class="container">
                                        <div class="list-single-header-item">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="list-single-header-item-opt fl-wrap">
                                                        <div class="list-single-header-cat fl-wrap">
                                                            <a href="#">{{$product->category}}</a>
                                                        </div>
                                                    </div>
                                                    <h2> {{$image->translation()->title}} </h2>
                                                    <span class="section-separator"></span>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="fl-wrap list-single-header-column">
                                                        <span class="viewed-counter"><i class="fa fa-eye"></i> Viewed -  156 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>About  </h3>
                                    </div>

                                    {!! $product->translation(current_locale())->description !!}


                                </div>
                                <!-- list-single-main-item-->
                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Menu</h3>
                                    </div>
                                    <div class="iframe-holder fl-wrap">

                                        <div class="accordion">
                                            <a class="toggle act-accordion" href="#">Gourmet pizze alla Napoletana <i class="fa fa-angle-down"></i></a>
                                            <div class="accordion-inner visible">
                                                <div class="opening-hours">

                                                    <ul>
                                                        <li><span class="opening-hours-day">Pizza Dalmacija </span><span class="opening-hours-time">17 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Kvarner </span><span class="opening-hours-time">14 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Istria </span><span class="opening-hours-time">13 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Lika </span><span class="opening-hours-time">18 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Zagorje </span><span class="opening-hours-time">17 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Podravina </span><span class="opening-hours-time">16 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Baranja </span><span class="opening-hours-time">21 €</span></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <a class="toggle" href="#"> Pizza clasicco <i class="fa fa-angle-down"></i></a>
                                            <div class="accordion-inner">
                                                <div class="opening-hours">

                                                    <ul>
                                                        <li><span class="opening-hours-day">Pizza Dalmacija </span><span class="opening-hours-time">17 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Kvarner </span><span class="opening-hours-time">14 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Istria </span><span class="opening-hours-time">13 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Lika </span><span class="opening-hours-time">18 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Zagorje </span><span class="opening-hours-time">17 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Podravina </span><span class="opening-hours-time">16 €</span></li>
                                                        <li><span class="opening-hours-day">Pizza Baranja </span><span class="opening-hours-time">21 €</span></li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- list-single-main-item end -->


                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap" id="sec4">
                                    <div class="box-widget-item-header">
                                        <h3>Location / Contacts : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="map-container">
                                            <div id="singleMap" data-latitude="{{$product->lat}}" data-longitude="{{$product->lon}}" data-mapTitle="Our Location"></div>
                                        </div>
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i class="fa fa-map-marker"></i> Adress :</span> <a href="https://www.google.com/maps/search/?api=1&query={{$product->lat}},{{$product->lon}}">{{$product->street}}, {{$product->zip}}, {{$product->city}}, {{$product->country}}</a></li>
                                                    <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">{{$product->phone}}</a></li>
                                                    <li><span><i class="fa fa-globe"></i> Website :</span> <a href="{{$product->web}}">{{$product->web}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="list-widget-social">
                                                <ul>
                                                    <li><a href="{{$product->facebook}}" target="_blank" ><i class="fa fa-facebook"></i></a></li>

                                                    <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
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
                            <div class="box-widget-wrap">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap" id="sec5">
                                    <div class="box-widget-item-header">
                                        <h3>Book a Table Online : </h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                            <form   class="add-comment custom-form">
                                                <fieldset>
                                                    <label><i class="fa fa-user-o"></i></label>
                                                    <input type="text" placeholder="Your Name *" value=""/>
                                                    <div class="clearfix"></div>
                                                    <label><i class="fa fa-envelope-o"></i>  </label>
                                                    <input type="text" placeholder="Email Address*" value=""/>
                                                    <div class="quantity fl-wrap">
                                                        <span><i class="fa fa-user-plus"></i>Persons : </span>
                                                        <div class="quantity-item">
                                                            <input type="button" value="-" class="minus">
                                                            <input type="text"    name="quantity"   title="Qty" class="qty" min="1" max="3" step="1" value="1">
                                                            <input type="button" value="+" class="plus">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label><i class="fa fa-calendar-check-o"></i>  </label>
                                                            <input type="text" placeholder="Date" class="datepicker"   data-large-mode="true" data-large-default="true" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label><i class="fa fa-clock-o"></i>  </label>
                                                            <input type="text" placeholder="Time" class="timepicker" value="12:00 am"/>
                                                        </div>
                                                    </div>
                                                    <textarea cols="40" rows="3" placeholder="Additional Information:"></textarea>
                                                </fieldset>
                                                <button class="btn  big-btn  color-bg flat-btn book-btn">Book Now<i class="fa fa-angle-right"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Working Hours : </h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                            <span class="current-status"><i class="fa fa-clock-o"></i> Now Open</span>
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

@endpush
