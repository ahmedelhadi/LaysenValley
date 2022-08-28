<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="{{route('admin.admin.index')}}">
                    <span class="brand-logo">
                        <img height="45" src="{{ asset('assets/images/logo.png') }}">
                    </span>
                    <h2 class="brand-text mb-0">{{ config('app.name', 'Laravel') }}</h2>
                </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                @can('admin view')
                <li class="dropdown nav-item active" >
                    <a class="nav-link d-flex align-items-center" href="{{route('admin.admin.index')}}" ><span data-i18n="Dashboards">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    {{trans('admin.dashboard')}}</span>
                </a>
                </li>
                @endcan

            

                @can('pages view')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="{{route('admin.pages.index')}}" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">{{trans('admin.cms')}}</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">

                        @can('pages view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.pages.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.pages')}}</span></a>
                        </li>
                        @endcan

                        @can('blocks view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.blocks.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.blocks')}}</span></a>
                        </li>
                        @endcan

                        @can('attributes view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.attributes.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.attributes')}}</span></a>
                        </li>
                        @endcan

                        @can('galleries view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.galleries.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.galleries')}}</span></a>
                        </li>
                        @endcan

                        @can('features view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.features.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.features')}}</span></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan


                @can('orders view')
                <li class="dropdown nav-item " >
                    <a class="nav-link d-flex align-items-center" href="{{route('admin.orders.index')}}" >
                        <span data-i18n="Apps">{{trans('admin.orders')}}</span>
                    </a>
                </li>
                @endcan


                @can('inquiries view')
                <li class="dropdown nav-item " >
                    <a class="nav-link d-flex align-items-center" href="{{route('admin.inquiries.index')}}" >
                        <span data-i18n="Apps">{{trans('admin.inquiries')}}</span>
                    </a>
                </li>
                @endcan


                @can('partners view')
                <li class="dropdown nav-item " >
                    <a class="nav-link d-flex align-items-center" href="{{route('admin.partners.index')}}" >
                        <span data-i18n="Apps">{{trans('admin.partners')}}</span>
                    </a>
                </li>
                @endcan

                @can('users view')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="{{route('admin.users.index')}}" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">{{trans('admin.users')}}</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        @can('roles view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.roles.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.roles')}}</span></a>
                        </li>

                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.roles.index')}}?table=true" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.all-roles')}}</span></a>
                        </li>
                        @endcan
                        
                        @can('users view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.users.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.users')}}</span></a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endcan





                @can('settings view')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="{{route('admin.settings.index')}}" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">{{trans('admin.settings')}}</span></a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
                        @can('statuses view')
                        <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{route('admin.statuses.index')}}" data-bs-toggle="" data-i18n=""><i data-feather="folder"></i><span data-i18n="">{{trans('admin.statuses')}}</span></a>
                        </li>
                        @endcan
                    </ul>
                    
                </li>
                @endcan




            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->



