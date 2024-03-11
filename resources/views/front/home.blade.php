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
    <script type="text/javascript" src="{{ asset('js/maps.js') }}"></script>

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
@endpush
