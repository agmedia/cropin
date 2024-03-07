@extends('back.layouts.admin')
@push('css_before')

    <link rel="stylesheet" href="{{ asset('assets/back/css/plugins/dataTables.bootstrap5.min.css') }}">

@endpush



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

        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
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
                            <td class="text-center">{{ $product->category}}</td>
                            <td class="text-center">{{ $product->city }}</td>
                            <td class="text-center">@include('back.layouts.partials.status', ['status' => $product->status])</td>
                            <td class="text-end">
                                <ul class="list-inline me-auto mb-0">
                                    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View Listing">
                                        <a href="#" class="avtar avtar-xs btn-link-secondary btn-pc-default">
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
            </div>
            <!-- [ sample-page ] end -->
        </div>
    </div>

@endsection

@push('js_after')

    <script src="{{ asset('assets/back/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        // [ Zero Configuration ] start
        $('#simpletable').DataTable();

    </script>
@endpush
