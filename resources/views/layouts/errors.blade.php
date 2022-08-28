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



    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @if (App::getLocale() == 'ar')

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">



    <link rel="stylesheet" href="{{ asset('assets/new/css/fonts.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/new/css/style.css') }}" >
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    @else

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">



    <link rel="stylesheet" href="{{ asset('assets/new/css/fonts.css') }}" >
    <link rel="stylesheet" href="{{ asset('assets/new/css/style.css') }}" >

    @endif
    <link href="{{asset('assets/chosen/chosen.css')}}" rel="stylesheet" />



    @yield('style')


    @livewireStyles


</head>

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">


    <!-- BEGIN: Header-->
    {{-- @include('dashboard.parts.header') --}}
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    {{-- @include('dashboard.parts.main-menu') --}}
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->





    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/vendors.min.js') }}"></script>


    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>

    <script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
    <script src="{{asset('assets/app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/app-assets/vendors/js/extensions/jstree.min.js')}}"></script>
    <script src="{{asset('assets/app-assets/js/scripts/pages/app-file-manager.js')}}"></script>
    <script src="{{asset('assets/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('assets/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('assets/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
    <script src="{{asset('assets/app-assets/js/scripts/extensions/ext-component-swiper.js')}}"></script>

    <script src="{{asset('assets/app-assets/js/scripts/extensions/ext-component-drag-drop.js')}}"></script>

    {{-- <script src="{{asset('assets/app-assets/js/scripts/extensions/ext-component-toastr.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('assets/js/chosen/chosen.proto.js')}}"></script>
     --}}
    
     {{-- <script src="{{asset('assets/chosen/jquery-3.2.1.min.js')}}" type="text/javascript"></script> --}}
     <script src="{{asset('assets/chosen/chosen.jquery.js')}}" type="text/javascript"></script>
     <script src="{{asset('assets/chosen/prism.js')}}" type="text/javascript" charset="utf-8"></script>
     <script src="{{asset('assets/chosen/init.js')}}" type="text/javascript" charset="utf-8"></script>
    
     <script src="{{asset('assets/js/jquery.maxlength.min.js')}}"></script>
    
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
        
            
            // $(".chosen-select").chosen({rtl: true});
            

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
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
              return new bootstrap.Popover(popoverTriggerEl, 
                {
                  html: true
                }
              )
            })

            $('.select2').select2();

            
      });
            
    </script>


    @yield('jquery')
    @livewireScripts
    @stack('scripts')

</body>

</html>
