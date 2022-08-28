<!doctype html>
<html dir="{{ trans('file.direction') }}" class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    data-textdirection="{{ trans('file.direction') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


     <link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @if (App::getLocale() == 'ar')

    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}" >


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">



    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">


    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/authentication.css') }}">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->



    @else

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css/custom.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- END: Custom CSS-->


    @endif

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('style')


    @livewireStyles


</head>

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">


                <!-- BEGIN: Content-->
                @yield('content')
                <!-- END: Content-->

            </div>
        </div>
    </div>
    <!-- END: Content-->



    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>


    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- <script src="{{ asset('assets/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script> -->
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    
    <script src="{{ asset('assets/app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- BEGIN: Page JS-->
    <!-- <script src="{{ asset('assets/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> -->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })


      $(document).ready(function() {
          $('.select2').select2();
      });
            
    </script>


    @yield('jquery')
    @livewireScripts
    @stack('scripts')

</body>

</html>
