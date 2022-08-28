
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="{{route('index')}}">
                    <span class="brand-logo">
                        <img  src="{{ asset('assets/images/logo.png') }}">
                    </span>
                        <h2 class="brand-text mb-0">{{ config('app.name', 'Laravel') }}</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item d-none d-lg-block"><a class="nav-link " href="{{route('index')}}"><i class="ficon" data-feather="home"></i></a></li>


                <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-{{ App::getLocale() }}"></i><span class="selected-language"></span></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">

                        @foreach (Config::get('languages') as $lang => $language)
                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}" data-language="{{$lang}}"><i class="flag-icon flag-icon-{{$lang}}"></i> {{$language}}</a>
                        @endforeach

                    </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

                @if (auth()->user()->unreadNotifications->count() > 0)
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">{{ auth()->user()->unreadNotifications->count() }}</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto"> {{ trans('admin.notifications') }}</h4>
                                <div class="badge rounded-pill badge-light-primary">{{ auth()->user()->unreadNotifications->count() }} {{trans('admin.new')}}</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                            <a class="d-flex" href="{{ route('admin.notifications.show',$notification->id) }}">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar"><img src="{{url($notification->notifiable->avatar ?? 'assets/app-assets/images/portrait/small/avatar-s-15.jpg')}}" alt="avatar" width="32" height="32"></div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">{!! $notification['data']['title'] !!}</p><small class="notification-text"> {!! $notification['data']['desc'] !!}</small>
                                    </div>
                                </div>
                            </a>

                            @empty

                            @endforelse


                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="{{ route('admin.notifications.index') }}">
                        {{ trans('admin.read_all_notifications') }} </a></li>
                    </ul>
                </li>
                @endif
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->fullname }}</span></div><span class="avatar"><img class="round" src="{{ asset( Auth::user()->avatar ?? 'assets/app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">


                        <a class="dropdown-item" href="{{route('admin.profile.index')}}"><i class="me-50" data-feather="user"></i> {{trans('admin.profile')}}</a>


                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{route('admin.settings.index')}}"><i class="me-50" data-feather="settings"></i> {{trans('admin.settings')}}</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="me-50" data-feather="power" ></i> {{trans('admin.logout')}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->



