@extends('back.layouts.admin')

@push('css_before')
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
                            <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images-tab-panel" role="tab"
                               aria-selected="true">
                                <i class="ti ti-settings me-2"></i>Images
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

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                          <div class="card">
                    <h5 class="card-header">Contact Info</h5>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-6 mt-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ isset($product) ? $product->address: old('address') }}" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" value="{{ isset($product) ? $product->zip : old('zip') }}" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ isset($product) ? $product->city : old('city') }}" />
                            </div>

                            <div class="col-6 mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ isset($product) ? $product->phone : old('phone') }}" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ isset($product) ? $product->email : old('email') }}" />
                            </div>
                            <div class="col-6 mt-3">
                                <label for="web">Web</label>
                                <input type="text" class="form-control" id="web" name="web" value="{{ isset($product) ? $product->web : old('web') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                          </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Working hours</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">

                                    <div class="col">
                                        <label class="form-check-label">Monday - Opening</label>
                                        <input class="form-control" id="monday-open" name="monday-open" type="text" placeholder="Select time">

                                    </div>
                                    <div class="col">
                                        <label class="form-check-label">Monday - Closing</label>
                                        <input class="form-control" id="monday-close" name="monday-close" type="text" placeholder="Select time">

                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="monday-not-working" id="monday-not-working">
                                            <label class="form-check-label" for="monday-not-working">Closed </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

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
                                                                <input type="text" class="form-control" id="meta-title-{{ $lang->code }}" name="meta_title[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($page) ? $page->translation($lang->code)->meta_title : old('meta_title.*') }}" />
                                                            </div>
                                                            <div class="col-12 mt-5">
                                                                <label for="meta-description-{{ $lang->code }}">Meta Description</label>
                                                                <textarea id="meta-description-{{ $lang->code }}" class="form-control" rows="4" data-always-show="true" name="meta_description[{{ $lang->code }}]" placeholder="{{ $lang->code }}" data-placement="top">{{ isset($page) ? $page->translation($lang->code)->meta_description : old('meta_description.*') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <div class="col-12">
                                                                <label for="slug-{{ $lang->code }}">SEO Slug <small class="m-l-30 fw-light">Best leave it alone on auto update by title</small></label>
                                                                <input type="text" class="form-control" id="slug-{{ $lang->code }}" name="slug[{{ $lang->code }}]" placeholder="{{ $lang->code }}" value="{{ isset($page) ? $page->translation($lang->code)->slug : old('slug.*') }}" />
                                                            </div>
                                                            <div class="col-12 mt-5">
                                                                <label for="keywords-{{ $lang->code }}">Keywords <small class="m-l-30 fw-light">Up to 5 keyword for each language</small></label>
                                                                <input class="form-control" id="keywords-{{ $lang->code }}" type="text" name="keywords[{{ $lang->code }}]" value="{{ isset($page) ? $page->translation($lang->code)->keywords : old('keywords.*') }}" placeholder="Enter something {{ $lang->code }}">
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

    </form>

@endsection


@push('js_after')

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

            document.querySelector('#monday-open').flatpickr({
                enableTime: true,
                noCalendar: true,
                time_24hr: true,
                defaultDate: '09:00'
            });

            document.querySelector('#monday-close').flatpickr({
                enableTime: true,
                noCalendar: true,
                time_24hr: true,
                defaultDate: '23:00'
            });


        });
    </script>

@endpush
