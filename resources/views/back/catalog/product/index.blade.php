@extends('back.layouts.admin')


@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h2 class="mb-0">Listings</h2>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus f-18"></i> Add New Listing
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('back.layouts.partials.session')

        <div class="col-md-4 mb-3">

            <div class="input-group">
                <input type="text" class="form-control" name="search" id="search-input" value="{{ request()->input('search') }}" placeholder="{{ __('back/apartment.searchname') }}">
                <button class="btn btn-primary" id="btn-search" onclick="setURL('search', $('#search-input').val(), true);"><i class="fa fa-search"></i> </button>
            </div>


        </div>

        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table  class="table table-striped table-bordered nowrap">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Title</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">City</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($products as $product)
                        <tr>
                            <td class="text-center">{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="user-image" class="wid-80 ">
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="fs-6 fw-medium bs-primary pc-link ps-2">{{ isset($product) ? $product->translation(current_locale())->title : old('title.*') }}</a>

                            </td>
                            <td class="text-center">{{collect(config('settings.categories'))[$product->category][current_locale()] }}</td>
                            <td class="text-center">{{ $product->city }}</td>
                            <td class="text-center">@include('back.layouts.partials.status', ['status' => $product->status])</td>
                            <td class="text-end">
                                <ul class="list-inline me-auto mb-0">
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View Listing">
                                        <a href="{{ route('resolve.route', ['product' => $product->translation(current_locale())->slug]) }}" target="_blank" class="avtar avtar-xs btn-link-secondary btn-pc-default">
                                            <i class="ti ti-eye f-18"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="avtar avtar-xs btn-link-success btn-pc-default">
                                            <i class="ti ti-edit-circle f-18"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
                                        <a href="javascript:void(0)" class="avtar avtar-xs btn-link-danger btn-pc-default" onclick="event.preventDefault(); deleteSettingsItem({{ $product->id }}, '{{ route('product.api.destroy') }}');">
                                            <i class="ti ti-trash f-18"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center"><a href="{{ route('product.create') }}">Make some products..!</a></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>

@endsection


@push('js_after')

    <!-- Page JS Plugins -->

    <script>
        $(() => {
            $('#status-select').select2({
                placeholder: '{{ __('back/app.select_status') }}',
                allowClear: true
            });
            $('#sort-select').select2({
                placeholder: '{{ __('back/app.sort') }}',
                allowClear: true
            });

            //
            $('#status-select').on('change', (e) => {
                setURL('status', e.currentTarget.selectedOptions[0]);
            });
            $('#sort-select').on('change', (e) => {
                setURL('sort', e.currentTarget.selectedOptions[0]);
            });

            //
            let url = new URL(location.href);
            if (url.search != '') {
                $('#apartments-filter').collapse();
            }

            //
            let input = document.getElementById("search-input");

            input.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    document.getElementById("btn-search").click();
                }
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
            })

            if (search.value) {
                params.append(type, search.value);
            }

            if (isValue && search) {
                params.append(type, search);
            }

            url.search = params;
            location.href = url;
        }

    </script>

@endpush
