@extends('back.layouts.admin')

@push('css_before')

    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>

@endpush

@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-4">Listing</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form action="{{ isset($product) ? route('product.update', ['product' => $product]) : route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (isset($product))
            {{ method_field('PATCH') }}
        @endif
        <div class="row">
            @include('back.layouts.partials.session')
            <div class="col-md-12">
             <div class="card">
                <div class="card-body py-0">
                    <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-info-circle me-2"></i>General
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="time-tab" data-bs-toggle="tab" href="#time-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-clock me-2"></i>Working time
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="menu-tab" data-bs-toggle="tab" href="#menu-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-file-certificate me-2"></i>Menu
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-photo me-2"></i>Images
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-settings me-2"></i>SEO
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane show active" id="general-tab-panel" role="tabpanel" aria-labelledby="general-tab">

                    <div class="col-md-12">
                            <div class="card">

                                <div class="d-flex card-header align-items-center justify-content-between">
                                    <h5 class="mb-0">General Info</h5>

                                    <div class="form-check form-switch custom-switch-v1 ">
                                        <input type="checkbox" class="form-check-input input-success" id="status-swich" name="status" @if (isset($product) and $product->status) checked @endif>
                                        <label class="form-check-label" for="status-swich">Status</label>
                                    </div>

                                </div>



                                <div class="card-body">
                                    <div class="position-relative">
                                    <ul class="nav nav-pills position-absolute langimg me-0 mb-2" id="pills-tab" role="tablist">
                                        @foreach(ag_lang() as $lang)
                                            <li class="nav-item">
                                                <a class="btn btn-icon btn-sm btn-link-primary ms-2 @if ($lang->code == current_locale()) active @endif" id="pills-{{ $lang->code }}-tab" data-bs-toggle="pill" href="#pills-{{ $lang->code }}" role="tab" aria-controls="pills-{{ $lang->code }}" aria-selected="true">
                                                    <img src="{{ asset('assets/flags/' . $lang->code . '.png') }}" />
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach(ag_lang() as $lang)
                                            <div class="tab-pane fade show @if ($lang->code == current_locale()) active @endif" id="pills-{{ $lang->code }}" role="tabpanel" aria-labelledby="pills-{{ $lang->code }}-tab">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="title-{{ $lang->code }}">Title @include('back.layouts.partials.required')</label>
                                                        <input type="text" class="form-control" id="title-{{ $lang->code }}" name="title[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($product) ? $product->translation($lang->code)->title : old('title.*') }}" />
                                                    </div>




                                                    <div class="col-12 mt-5">
                                                        <label for="description-{{ $lang->code }}">Description</label>
                                                        <textarea id="description-{{ $lang->code }}" class="form-control" rows="8" data-always-show="true" name="description[{{ $lang->code }}]" placeholder="{{ $lang->code }}" data-placement="top">{{ isset($product) ? $product->translation($lang->code)->description : old('description.*') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    </div>





                                <div class="form-group row ">
                                    <div class="col-6 mt-3">
                                        <label for="address">Search address</label>
                                        <div class="input-group">

                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ isset($product) ? $product->address: old('address') }}" />
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3">
                                        <label >Category</label>
                                        <select class="form-select" name="category">
                                            <option>Select...</option>
                                            <option value="Bars">Bars</option>
                                            <option value="Clubs">Clubs</option>
                                            <option value="Food">Food</option>
                                            <option value="Fun">Fun</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-6 mt-3">
                                        <label for="address">Street and Number</label>
                                        <input type="text" class="form-control" id="street" name="street" value="{{ isset($product) ? $product->street: old('street') }}" readonly/>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="zip">Zip</label>
                                        <input type="text" class="form-control" id="zip" name="zip" maxlength="5" value="{{ isset($product) ? $product->zip : old('zip') }}" readonly/>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ isset($product) ? $product->city : old('city') }}" readonly/>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="city">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ isset($product) ? $product->country : old('country') }}" readonly/>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="city">Latitude</label>
                                        <input type="text" class="form-control" id="lat" name="lat" value="{{ isset($product) ? $product->lat : old('lat') }}" readonly/>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="city">Longitude</label>
                                        <input type="text" class="form-control" id="lon" name="lon" value="{{ isset($product) ? $product->lon : old('lon') }}" readonly/>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">

                            <h5 class="mb-0 card-header">Contact info</h5>

                            <div class="card-body">



                                <div class="form-group row ">



                                    <div class="col-md-6 mt-3">

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="web">+3859...</span>
                                                <input type="text" class="form-control"  id="phone" name="phone" value="{{ isset($product) ? $product->phone : old('phone') }}"  aria-describedby="phone">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ isset($product) ? $product->email : old('email') }}" />
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="web">Web URL</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="web">https://www...</span>

                                                <input type="text" class="form-control"  id="web" name="web" value="{{ isset($product) ? $product->web : old('web') }}"  aria-describedby="web">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="facebook">Facebook </label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="facebook"><i class="fab fa-facebook-square"></i></span>

                                                <input type="text" class="form-control"  id="facebook" name="facebook" value="{{ isset($product) ? $product->facebook : old('facebook') }}"  aria-describedby="facebook">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="facebook">Instagram</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="instagram"><i class="fab fa-instagram"></i></span>

                                                <input type="text" class="form-control"  id="instagram" name="instagram" value="{{ isset($product) ? $product->instagram : old('instagram') }}"  aria-describedby="instagram">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="tiktok">TikTok</label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="tiktok"><img src="{{ asset('assets/back/images/tiktok.svg') }}" style="width:12px" alt="tiktok"  /></span>

                                                <input type="text" class="form-control"  id="tiktok" name="tiktok" value="{{ isset($product) ? $product->tiktok : old('tiktok') }}"  aria-describedby="tiktok">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="tab-pane " id="time-tab-panel" role="tabpanel" aria-labelledby="time-tab">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Working hours</h5>
                            </div>
                            <div class="card-body">

                                @foreach (config('settings.week_list') as $item)
                                    <div class="row g-3 mt-1 align-items-center">
                                        <h6 class="mb-0">{{$item['title'][current_locale()]}} </h6>
                                        <div class="col">

                                            <input class="form-control" id="{{$item['value']}}-open" name="{{$item['value']}}-open" type="text" placeholder="Opening time ">

                                        </div>
                                        <div class="col">

                                            <input class="form-control" id="{{$item['value']}}-close" name="{{$item['value']}}-close" type="text" placeholder="Closing time">

                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="{{$item['value']}}-not-working" id="{{$item['value']}}-not-working">
                                                <label class="form-check-label" for="{{$item['value']}}-not-working">Closed </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>


                <div class="tab-pane " id="menu-tab-panel" role="tabpanel" aria-labelledby="menu-tab">

                </div>

                <div class="tab-pane " id="images-tab-panel" role="tabpanel" aria-labelledby="images-tab">

                </div>


                <div class="tab-pane " id="seo-tab-panel" role="tabpanel" aria-labelledby="seo-tab">

                    <div class="col-md-12">
                        <div class="card">
                            <h5 class="card-header">Page SEO</h5>
                            <div class="card-body">
                                <div class="position-relative">
                                    <ul class="nav nav-pills position-absolute langimg me-0 mb-2" id="seo-tab" role="tablist">
                                        @foreach(ag_lang() as $lang)
                                            <li class="nav-item">
                                                <a class="btn btn-icon btn-sm btn-link-primary ms-2 @if ($lang->code == current_locale()) active @endif" id="seo-{{ $lang->code }}-tab" data-bs-toggle="pill" href="#seo-{{ $lang->code }}" role="tab" aria-controls="seo-{{ $lang->code }}" aria-selected="true">
                                                    <img src="{{ asset('assets/flags/' . $lang->code . '.png') }}" />
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="tab-content" id="seo-tabContent">
                                        @foreach(ag_lang() as $lang)
                                            <div class="tab-pane fade show @if ($lang->code == current_locale()) active @endif" id="seo-{{ $lang->code }}" role="tabpanel" aria-labelledby="seo-{{ $lang->code }}-tab">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label for="meta-title-{{ $lang->code }}">Meta Title</label>
                                                                <input type="text" class="form-control" id="meta-title-{{ $lang->code }}" name="meta_title[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($product) ? $product->translation($lang->code)->meta_title : old('meta_title.*') }}" />
                                                            </div>
                                                            <div class="col-12 mt-5">
                                                                <label for="meta-description-{{ $lang->code }}">Meta Description</label>
                                                                <textarea id="meta-description-{{ $lang->code }}" class="form-control" rows="4" data-always-show="true" name="meta_description[{{ $lang->code }}]" placeholder="{{ $lang->code }}" data-placement="top">{{ isset($product) ? $product->translation($lang->code)->meta_description : old('meta_description.*') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label for="slug-{{ $lang->code }}">SEO Slug <small class="m-l-30 fw-light">Best leave it alone on auto update by title</small></label>
                                                                <input type="text" class="form-control" id="slug-{{ $lang->code }}" name="slug[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($product) ? $product->translation($lang->code)->slug : old('slug.*') }}" />
                                                            </div>
                                                            <div class="col-12 mt-5">
                                                                <label for="keywords-{{ $lang->code }}">Keywords <small class="m-l-30 fw-light">Up to 5 keyword for each language</small></label>
                                                                <input class="form-control" id="keywords-{{ $lang->code }}" type="text" name="keywords[{{ $lang->code }}]" value="{{ isset($product) ? $product->translation($lang->code)->keywords : old('keywords.*') }}" placeholder="Enter something {{ $lang->code }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success my-2">
                            {{ __('Save') }} <i class="ti ti-check ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection


@push('js_after')

    <script>
        function initAutocomplete() {
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                var arrAddress = place.address_components;

                var lat = place.geometry.location.lat();
                var lon = place.geometry.location.lng();

                var itemRoute='';
                var itemLocality='';
                var itemCountry='';
                var itemPc='';
                var itemSnumber='';

                // iterate through address_component array
                $.each(arrAddress, function (i, address_component) {
                    //  console.log('address_component:'+i);

                    if (address_component.types[0] == "route"){
                        //  console.log(i+": route:"+address_component.long_name);
                        itemRoute = address_component.long_name;
                    }

                    if (address_component.types[0] == "locality"){
                        //   console.log("town:"+address_component.long_name);
                        itemLocality = address_component.long_name;
                    }

                    if (address_component.types[0] == "country"){
                        //    console.log("country:"+address_component.long_name);
                        itemCountry = address_component.long_name;
                    }

                    if (address_component.types[0] == "postal_code"){
                        //  console.log("pc:"+address_component.long_name);
                        itemPc = address_component.long_name;
                    }

                    if (address_component.types[0] == "street_number"){
                        // console.log("street_number:"+address_component.long_name);
                        itemSnumber = address_component.long_name;
                    }
                    //return false; // break the loop
                });

                document.getElementById("street").value = itemRoute +', ' + itemSnumber;
                document.getElementById("city").value = itemLocality;
                document.getElementById("zip").value = itemPc;
                document.getElementById("country").value = itemCountry;

               document.getElementById('lat').value=lat;
               document.getElementById('lon').value=lon;

                //  document.getElementById('city').value = place.name;
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initAutocomplete"></script>



    <script>
        $(() => {
            {!! ag_lang() !!}.forEach(function(item) {
                ClassicEditor
                .create(document.querySelector('#description-' + item.code))
                .then(editor => {
                    editor.rows = 8;
                })
                .catch(error => {
                    //console.error(error);
                });
            });



            @foreach (config('settings.week_list') as $item)

            document.querySelector('#{{$item['value']}}-open').flatpickr({
                enableTime: true,
                noCalendar: true,
                time_24hr: true,
                defaultDate: '08:00'
            });
            @endforeach

            @foreach (config('settings.week_list') as $item)
            document.querySelector('#{{$item['value']}}-close').flatpickr({
                enableTime: true,
                noCalendar: true,
                time_24hr: true,
                defaultDate: '23:00'
            });
            @endforeach

        });
    </script>

@endpush
