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
        <div class="content">
            <!-- Map -->
            <div class="map-container fw-map">
                <div id="map-main"></div>
                <ul class="mapnavigation">
                    <li><a href="#" class="prevmap-nav"><i class="fa fa-backward" aria-hidden="true"></i>
                        </a></li>
                    <li><a href="#" class="nextmap-nav"><i class="fa fa-forward" aria-hidden="true"></i>
                        </a></li>
                </ul>

            </div>
            <!-- Map end -->
            <!-- section -->
            <section class="gray-bg no-pading no-top-padding">
                <div class="col-list-wrap fh-col-list-wrap  left-list">
                    <div class="container">
                        <div class="row">

                            <!-- sidebar filters -->
                            <div class="col-md-4">
                                <div class="fl-wrap ">
                                    <form action="{{ route('index') }}" id="search-form" method="get">
                                        <!-- listsearch-input-wrap  -->
                                        <div class="listsearch-input-wrap fl-wrap">

                                            <div class="box-widget-item-header">
                                                <h3>{{ __('front/apartment.search') }} </h3>
                                            </div>

                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Location" class="chosen-select" name="location" id="select-location">
                                                    <option value="all">{{ __('front/apartment.all_locations') }} </option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city }}" {{ $city == request()->input('location') ? 'selected' : '' }}>{{ $city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="{{ __('front/apartment.all_categories') }}" class="chosen-select" name="category" id="select-category">
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $key ? $category[current_locale()] : 'all' }}" {{ $category[current_locale()] == request()->input('category') ? 'selected' : '' }}>{{ $category[current_locale()] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- hidden-listing-filter end -->
                                            <button class="button fs-map-btn">{{ __('front/apartment.search') }} </button>
                                        </div>
                                    </form>
                                    <!-- listsearch-input-wrap end -->
                                </div>
                            </div>
                            <!-- sidebar filters end -->
                            <div class="col-md-8 ">
                                <div class="listsearch-header fl-wrap">
                                    <h3>{{ __('front/apartment.result_for') }}: <span>{{request()->get('category') ? request()->get('category') :  __('front/apartment.all_categories') }}</span></h3>

                                </div>
                                <!-- list-main-wrap-->
                                <div class="list-main-wrap fl-wrap card-listing">
                                    <!-- listing-item -->
                                    @foreach ($listings as $listing)

                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <a  href="{{ route('resolve.route', ['product' => $listing->translation(current_locale())->slug]) }}">
                                                        <img src="{{ $listing->image }}" alt="">
                                                        <div class="overlay"></div>
                                                    </a>
                                                </div>

                                                @php($cat =collect(config('settings.categories'))->get($listing->category))

                                                <div class="geodir-category-content fl-wrap">
                                                    <a class="listing-geodir-category" href="listing.html">{{$cat[current_locale()] }}</a>

                                                    <h3><a href="{{ route('resolve.route', ['product' => $listing]) }}">{{ $listing->translation(current_locale())->title }}</a></h3>

                                                    <div class="geodir-category-options fl-wrap">

                                                        <div class="geodir-category-location"><a href="#0" class="map-item scroll-top-map"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $listing->address }}</a></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>

                                        @if($loop->iteration / 2)
                                            <div class="clearfix"></div>
                                        @endif
                                    @endforeach

                                </div>
                                <!-- list-main-wrap end-->
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- section end -->
            <div class="limit-box fl-wrap"></div>

        </div>
        <!-- content end -->
    </div>
@endsection

@push('js_after')
{{--    <script type="text/javascript" src="{{ asset('js/maps.js') }}"></script>--}}

    <script>
        $(() => {
            $('#select-category').on('change', (e) => {
                setURL('category', e.currentTarget.selectedOptions[0]);
            });
            $('#select-location').on('change', (e) => {
                setURL('location', e.currentTarget.selectedOptions[0]);
            });
        });

        /**
         *
         * @param type
         * @param search
         */
        function setURL(type, search, isValue = false) {
            let url = new URL(location.href);
            let params = new URLSearchParams(url.search);
            let keys = [];

            for(var key of params.keys()) {
                if (key === type) {
                    keys.push(key);
                }
            }

            keys.forEach((value) => {
                if (params.has(value)) {
                    params.delete(value);
                }
                if (value == 'all') {
                    params.delete(value);
                }
            })

            if (search.value) {
                params.append(type, search.value);
            }

            if (isValue && search) {
                params.append(type, search);
            }

            if (search.value == 'all') {
                params.delete(type);
            }

            url.search = params;
            location.href = url;
        }
    </script>

    <script>
        (function ($) {
            "use strict";
            var markerIcon = {
                anchor: new google.maps.Point(22, 16),
                url: 'images/marker.png',
            }

            function mainMap() {
                function locationData(locationURL, locationCategory, locationImg, locationTitle, locationAddress, locationPhone, locationStarRating, locationRevievsCounter) {
                    return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fa fa-times"></i></div><div class="map-popup-category">' + locationCategory + '</div><a href="' + locationURL + '" class="listing-img-content fl-wrap"><img src="' + locationImg + '" alt=""></a> <div class="listing-content fl-wrap"><div class="card-popup-raining map-card-rainting" data-staRrating="' + locationStarRating + '"><span class="map-popup-reviews-count">( ' + locationRevievsCounter + ' reviews )</span></div><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><span class="map-popup-location-info"><i class="fa fa-map-marker"></i>' + locationAddress + '</span><span class="map-popup-location-phone"><i class="fa fa-phone"></i>' + locationPhone + '</span></div></div></div></div>')
                }

                var locations = [];


                @json($locations).forEach((item, index) => {
                    locations.push([
                        locationData(item.url, item.category, item.image, item.title, item.address, item.phone, item.rating, item.reviews),
                        item.longitude,
                        item.latitude,
                        5,
                        markerIcon
                    ]);
                });



                var map = new google.maps.Map(document.getElementById('map-main'), {
                    zoom: 9,
                    scrollwheel: false,
                    center: new google.maps.LatLng(45.81272188424127, 15.992770800143356),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    panControl: false,
                    fullscreenControl: true,
                    navigationControl: false,
                    streetViewControl: false,
                    animation: google.maps.Animation.BOUNCE,
                    gestureHandling: 'cooperative',
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#4DB7FE"},{"visibility":"on"}]}]
                });


                var boxText = document.createElement("div");
                boxText.className = 'map-box'
                var currentInfobox;
                var boxOptions = {
                    content: boxText,
                    disableAutoPan: true,
                    alignBottom: true,
                    maxWidth: 0,
                    pixelOffset: new google.maps.Size(-145, -45),
                    zIndex: null,
                    boxStyle: {
                        width: "260px"
                    },
                    closeBoxMargin: "0",
                    closeBoxURL: "",
                    infoBoxClearance: new google.maps.Size(1, 1),
                    isHidden: false,
                    pane: "floatPane",
                    enableEventPropagation: false,
                };
                var markerCluster, marker, i;
                var allMarkers = [];
                var clusterStyles = [{
                    textColor: 'white',
                    url: '',
                    height: 50,
                    width: 50
                }];


                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        icon: locations[i][4],
                        id: i
                    });
                    allMarkers.push(marker);
                    var ib = new InfoBox();
                    google.maps.event.addListener(ib, "domready", function () {
                        cardRaining()
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            ib.setOptions(boxOptions);
                            boxText.innerHTML = locations[i][0];
                            ib.close();
                            ib.open(map, marker);
                            currentInfobox = marker.id;
                            var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
                            map.panTo(latLng);
                            map.panBy(0, -180);
                            google.maps.event.addListener(ib, 'domready', function () {
                                $('.infoBox-close').click(function (e) {
                                    e.preventDefault();
                                    ib.close();
                                });
                            });
                        }
                    })(marker, i));
                }
                var options = {
                    imagePath: 'images/',
                    styles: clusterStyles,


                };
                markerCluster = new MarkerClusterer(map, allMarkers, options);
                google.maps.event.addDomListener(window, "resize", function () {
                    var center = map.getCenter();
                    google.maps.event.trigger(map, "resize");
                    map.setCenter(center);
                });

                $('.nextmap-nav').click(function (e) {
                    e.preventDefault();
                    map.setZoom(15);
                    var index = currentInfobox;
                    if (index + 1 < allMarkers.length) {
                        google.maps.event.trigger(allMarkers[index + 1], 'click');
                    } else {
                        google.maps.event.trigger(allMarkers[0], 'click');
                    }
                });
                $('.prevmap-nav').click(function (e) {
                    e.preventDefault();
                    map.setZoom(15);
                    if (typeof (currentInfobox) == "undefined") {
                        google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                    } else {
                        var index = currentInfobox;
                        if (index - 1 < 0) {
                            google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                        } else {
                            google.maps.event.trigger(allMarkers[index - 1], 'click');
                        }
                    }
                });
                $('.map-item').click(function (e) {
                    e.preventDefault();
                    map.setZoom(15);
                    var index = currentInfobox;
                    var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
                    google.maps.event.trigger(allMarkers[marker_index], "click");
                    if ($(this).hasClass("scroll-top-map")){
                        $('html, body').animate({
                            scrollTop: $(".map-container").offset().top+ "-80px"
                        }, 500)
                    }
                    else if ($(window).width()<1064){
                        $('html, body').animate({
                            scrollTop: $(".map-container").offset().top+ "-80px"
                        }, 500)
                    }
                });
                // Scroll enabling button
                var scrollEnabling = $('.scrollContorl');

                $(scrollEnabling).click(function(e){
                    e.preventDefault();
                    $(this).toggleClass("enabledsroll");

                    if ( $(this).is(".enabledsroll") ) {
                        map.setOptions({'scrollwheel': true});
                    } else {
                        map.setOptions({'scrollwheel': false});
                    }
                });
                //    var zoomControlDiv = document.createElement('div');
                //  var zoomControl = new ZoomControl(zoomControlDiv, map);

                function ZoomControl(controlDiv, map) {
                    zoomControlDiv.index = 1;
                    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
                    controlDiv.style.padding = '5px';
                    var controlWrapper = document.createElement('div');
                    controlDiv.appendChild(controlWrapper);
                    var zoomInButton = document.createElement('div');
                    zoomInButton.className = "mapzoom-in";
                    controlWrapper.appendChild(zoomInButton);
                    var zoomOutButton = document.createElement('div');
                    zoomOutButton.className = "mapzoom-out";
                    controlWrapper.appendChild(zoomOutButton);
                    google.maps.event.addDomListener(zoomInButton, 'click', function () {
                        map.setZoom(map.getZoom() + 1);
                    });
                    google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                        map.setZoom(map.getZoom() - 1);
                    });
                }


            }
            var map = document.getElementById('map-main');
            if (typeof (map) != 'undefined' && map != null) {
                google.maps.event.addDomListener(window, 'load', mainMap);
            }


        })(this.jQuery);

    </script>
@endpush
