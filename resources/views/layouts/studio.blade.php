<!doctype html>
<html dir="{{ trans('file.direction') }}" class="loading"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ trans('file.direction') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('assets/app-assets/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/app-assets/images/ico/favicon.ico') }}">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    @if (App::getLocale() == 'ar')


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/toastr.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/extensions/jstree.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/plugins/extensions/ext-component-tree.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/css-rtl/pages/app-file-manager.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/new/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/new/css/style.css') }}">
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    @endif

    @yield('style')


    @livewireStyles


</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-expanded" data-open="click"
    data-menu="vertical-menu-modern" data-col="">


    <!-- BEGIN: Header-->
    @include('dashboard.parts.header-studio')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('dashboard.parts.main-menu-studio')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content file-manager-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0 border-0">
            <!-- BEGIN: Content-->
            @yield('content')
            <!-- END: Content-->
            
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Footer-->
    @include('dashboard.parts.footer-studio')
    <!-- END: Footer-->


    <script src="{{ asset('assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    {{-- <script src="{{asset('assets/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script> --}}
    <script src="{{asset('assets/app-assets/vendors/js/extensions/jstree.min.js')}}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/scripts/pages/app-file-manager.js') }}"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery_lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
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
        window.addEventListener('show_toastr', event => {
            var isRtl = $('html').attr('data-textdirection') === 'rtl';
            //success
            //error
            toastr[event.detail.status](event.detail.message,
                '{{trans("file.alert")}} !', {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: isRtl
                });

        });

    </script>



    @yield('jquery')
    @livewireScripts
    @stack('scripts')

</body>

</html>
