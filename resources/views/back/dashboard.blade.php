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
                                <h5 class="mb-1">839</h5>
                                <p class="text-success mb-0"><i class="ti ti-arrow-up-right"></i> Total</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Monthly Page View</h5>
                </div>
                <div class="card-body">
                    <h5 class="text-end my-2"><span class="badge bg-success">Total Views</span> 5.44%  </h5>
                    <div id="customer-rate-graph"></div>
                </div>
            </div>
        </div>



    </div>

@endsection

@push('js_before')
    <script src="{{ asset('assets/back/js/plugins/apexcharts.min.js') }}"></script>
   {{-- <script src="{{ asset('assets/back/js/pages/dashboard-default.js') }}"></script> --}}
    <script>
        'use strict';
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                floatchart();
            }, 500);
        });

        function floatchart() {
            (function () {
                var options1 = {
                    chart: { type: 'bar', height: 50, sparkline: { enabled: true } },
                    colors: ['#4680FF'],
                    plotOptions: { bar: { columnWidth: '80%' } },
                    series: [
                        {
                            data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25]
                        }
                    ],
                    xaxis: { crosshairs: { width: 1 } },
                    tooltip: {
                        fixed: { enabled: false },
                        x: { show: false },
                        y: {
                            title: {
                                formatter: function (seriesName) {
                                    return '';
                                }
                            }
                        },
                        marker: { show: false }
                    }
                };
                var chart = new ApexCharts(document.querySelector('#all-earnings-graph'), options1);
                chart.render();
                var options2 = {
                    chart: { type: 'bar', height: 50, sparkline: { enabled: true } },
                    colors: ['#E58A00'],
                    plotOptions: { bar: { columnWidth: '80%' } },
                    series: [
                        {
                            data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25]
                        }
                    ],
                    xaxis: { crosshairs: { width: 1 } },
                    tooltip: {
                        fixed: { enabled: false },
                        x: { show: false },
                        y: {
                            title: {
                                formatter: function (seriesName) {
                                    return '';
                                }
                            }
                        },
                        marker: { show: false }
                    }
                };
                var chart = new ApexCharts(document.querySelector('#page-views-graph'), options2);
                chart.render();
                var options3 = {
                    chart: { type: 'bar', height: 50, sparkline: { enabled: true } },
                    colors: ['#2CA87F'],
                    plotOptions: { bar: { columnWidth: '80%' } },
                    series: [
                        {
                            data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25]
                        }
                    ],
                    xaxis: { crosshairs: { width: 1 } },
                    tooltip: {
                        fixed: { enabled: false },
                        x: { show: false },
                        y: {
                            title: {
                                formatter: function (seriesName) {
                                    return '';
                                }
                            }
                        },
                        marker: { show: false }
                    }
                };
                var chart = new ApexCharts(document.querySelector('#total-task-graph'), options3);
                chart.render();
                var options4 = {
                    chart: { type: 'bar', height: 50, sparkline: { enabled: true } },
                    colors: ['#DC2626'],
                    plotOptions: { bar: { columnWidth: '80%' } },
                    series: [
                        {
                            data: [10, 30, 40, 20, 60, 50, 20, 15, 20, 25, 30, 25]
                        }
                    ],
                    xaxis: { crosshairs: { width: 1 } },
                    tooltip: {
                        fixed: { enabled: false },
                        x: { show: false },
                        y: {
                            title: {
                                formatter: function (seriesName) {
                                    return '';
                                }
                            }
                        },
                        marker: { show: false }
                    }
                };
                var chart = new ApexCharts(document.querySelector('#download-graph'), options4);
                chart.render();
                var options5 = {
                    chart: {
                        fontFamily: 'Inter var, sans-serif',
                        type: 'area',
                        height: 370,
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#0d6efd', '#8996A4'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            type: 'vertical',
                            inverseColors: false,
                            opacityFrom: 0.2,
                            opacityTo: 0
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 3
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            borderRadius: 4
                        }
                    },
                    grid: {
                        show: true,
                        borderColor: '#F3F5F7',
                        strokeDashArray: 2
                    },
                    series: [
                        {
                            name: 'This Year',
                            data: [20, 70, 40, 70, 70, 90, 500, 55, 45, 60, 50, 65]
                        },
                        {
                            name: 'Last Year',
                            data: [10, 40, 20, 40, 50, 70, 80, 30, 15, 32, 90, 30]
                        }
                    ],
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    }
                };
                var chart = new ApexCharts(document.querySelector('#customer-rate-graph'), options5);
                chart.render();
                var options6 = {
                    chart: {
                        type: 'area',
                        height: 60,
                        stacked: true,
                        sparkline: { enabled: true }
                    },
                    colors: ['#4680FF'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            type: 'vertical',
                            inverseColors: false,
                            opacityFrom: 0.5,
                            opacityTo: 0
                        }
                    },
                    stroke: { curve: 'smooth', width: 2 },
                    series: [{ data: [5, 25, 3, 10, 4, 50, 0] }]
                };
                var chart = new ApexCharts(document.querySelector('#total-tasks-graph'), options6);
                chart.render();
                var options7 = {
                    chart: {
                        type: 'area',
                        height: 60,
                        stacked: true,
                        sparkline: { enabled: true }
                    },
                    colors: ['#DC2626'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            type: 'vertical',
                            inverseColors: false,
                            opacityFrom: 0.5,
                            opacityTo: 0
                        }
                    },
                    stroke: { curve: 'smooth', width: 2 },
                    series: [{ data: [0, 50, 4, 10, 3, 25, 5] }]
                };
                var chart = new ApexCharts(document.querySelector('#pending-tasks-graph'), options7);
                chart.render();
                var options8 = {
                    chart: {
                        height: 320,
                        type: 'donut'
                    },
                    series: [27, 23, 20, 17],
                    colors: ['#4680FF', '#E58A00', '#2CA87F', '#4680FF'],
                    labels: ['Total income', 'Total rent', 'Download', 'Views'],
                    fill: {
                        opacity: [1, 1, 1, 0.3]
                    },
                    legend: {
                        show: false
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    name: {
                                        show: true
                                    },
                                    value: {
                                        show: true
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    responsive: [
                        {
                            breakpoint: 480,
                            options: {
                                plotOptions: {
                                    pie: {
                                        donut: {
                                            size: '65%',
                                            labels: {
                                                show: true
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    ]
                };
                var chart = new ApexCharts(document.querySelector('#total-income-graph'), options8);
                chart.render();
            })();
        }

    </script>
@endpush
