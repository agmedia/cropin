@extends('back.layouts.admin')

@section('content')

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Home</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-primary">



                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#4680FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="0.6" d="M14.5 4.5V6.5C14.5 7.6 15.4 8.5 16.5 8.5H18.5" stroke="#4680FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="0.6" d="M8 13H12" stroke="#4680FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path opacity="0.6" d="M8 17H16" stroke="#4680FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>



                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">All Listings</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <div class="col-7">
                                <div id="all-earnings-graph"></div>
                            </div>


                            <div class="col-5">
                                <h5 class="mb-1">{{ $data['countlistings'] }}</h5>
                                <p class="text-primary mb-0"><i class="ti ti-arrow-up-right"></i> Total</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M8 2V5"
                                            stroke="#2ca87f"
                                            stroke-width="1.5"
                                            stroke-miterlimit="10"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M16 2V5"
                                            stroke="#2ca87f"
                                            stroke-width="1.5"
                                            stroke-miterlimit="10"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M3.5 9.08984H20.5"
                                            stroke="#2ca87f"
                                            stroke-width="1.5"
                                            stroke-miterlimit="10"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                            stroke="#2ca87f"
                                            stroke-width="1.5"
                                            stroke-miterlimit="10"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M15.6947 13.7002H15.7037"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M15.6947 16.7002H15.7037"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M11.9955 13.7002H12.0045"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M11.9955 16.7002H12.0045"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M8.29431 13.7002H8.30329"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                    <path
                                            opacity="0.4"
                                            d="M8.29395 16.7002H8.30293"
                                            stroke="#2ca87f"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">Total Bookings</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <div class="col-7">
                                <div id="total-task-graph"></div>
                            </div>
                            <div class="col-5">
                                <h5 class="mb-1">0</h5>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> Total</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">




                    <div class="d-flex card-header align-items-center justify-content-between">
                        <h5 class="mb-0">Recent Listings</h5>

                        <a href="{{ route('product.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Add New Listing
                        </a>
                    </div>






                <div class="card-body">
                    <div class="row">
                        @include('back.layouts.partials.session')

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
                </div>
            </div>
        </div>



    </div>

@endsection

@push('js_before')
    <script src="{{ asset('assets/back/js/plugins/apexcharts.min.js') }}"></script>
   <script src="{{ asset('assets/back/js/pages/dashboard-default.js') }}"></script>

@endpush
