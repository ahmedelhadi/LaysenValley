@extends('layouts.admin')

@section('content')

{{-- 
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-body">

            <section id="dashboard-analytics">
                <div class="row match-height">


                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{asset('assets/app-assets/images/elements/decore-left.png')}}" class="congratulations-img-right" alt="card-img-right">
                                <img src="{{asset('assets/app-assets/images/elements/decore-right.png')}}" class="congratulations-img-left" alt="card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">لا يهم أن تصل إلى القمة، بل المهم أن تكون راضيًا عما أنجزته في حياتك.</h1>
                                    <p class="card-text m-auto w-75">
                                        انطلق الان <strong>انت بطل حياتك</strong> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
 
                     <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="settings" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{count($projects)}}</h2>
                                <p class="card-text">{{trans('file.projects')}}</p>
                            </div>
                            <div id="gained-chart"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="folder" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{count($dnas)}}</h2>
                                <p class="card-text">{{trans('file.dnas')}}</p>
                            </div>
                            <div id="order-chart"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start pb-0">
                                <div class="avatar bg-light-info p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder mt-1">{{count($users)}}</h2>
                                <p class="card-text">{{trans('file.participants')}}</p>
                            </div>
                            <div id="participants-chart"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">{{trans('admin.dna_report')}}</h4>
                                <span class="card-subtitle text-muted">{{trans('admin.dna_report_desc')}} </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-12">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title mb-75">{{trans('admin.project_report')}}</h4>
                                <span class="card-subtitle text-muted">{{trans('admin.project_report_desc')}} </span>
                            </div>
                            <div class="card-body">
                                <div id="donut-chart2"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-md-row flex-column justify-content-md-between justify-content-start align-items-md-center align-items-start">
                                <h4 class="card-title">Data Science</h4>
                                <div class="d-flex align-items-center mt-md-0 mt-1">
                                    <i class="font-medium-2" data-feather="calendar"></i>
                                    <input type="text" class="form-control flat-picker bg-transparent border-0 shadow-none" placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="column-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>


        </div>
    </div>
</div>

--}}

@endsection



@section('jquery')

    <script src="{{asset('assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>

    <script src="{{asset('assets/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>

    <script src="{{asset('assets/app-assets/js/scripts/charts/chart-apex.js')}}"></script>

    <script type="text/javascript">
        


    </script>

@endsection
