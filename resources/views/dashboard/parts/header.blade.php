
<header class="pt-3 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-2 d-flex align-items-center">
          <div class="logo text-center">
            <a href="{{route('dashboard.dashboard.index')}}"><img class="img-fluid" src="{{ asset('assets/new/images/logo.png') }}"></a>
          </div>
      </div>
      <div class="col-7 col-sm-6">
        {{-- 
        <ul class="list-inline mb-0 mt-2">

          <li class="list-inline-item">
            <a class="nav-link active" href="#">التدريب</a>
          </li>
          <li class="list-inline-item">
            <a class="nav-link" href="#">عن المنصة</a>
          </li>
        </ul>
        --}}
      </div>

      <div class="col-5 col-sm-4">
        <ul class="list-inline menu mb-0 float-end">
          <li class="list-inline-item dropdown-notification position-relative">
            @if (auth()->user() && auth()->user()->unreadNotifications->count() > 0)
            <a class="nav-link" href="#" data-bs-toggle="dropdown">
              <i class="fas fa-bell"></i><span class="badge rounded-pill bg-danger badge-up">{{ auth()->user()->unreadNotifications->count() }}</span>
            </a>

                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto"> {{ trans('admin.notifications') }}</h4>
                            <div class="badge rounded-pill badge-light-primary">{{ auth()->user()->unreadNotifications->count() }} {{trans('admin.new')}}</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        @forelse(auth()->user()->unreadNotifications->take(3) as $notification)
                        <a class="d-flex" href="{{ route('dashboard.notifications.show',$notification->id) }}">
                            <div class="list-item d-flex align-items-start">
                                <div class="me-1">
                                    <div class="avatar"><img src="{{url($notification->notifiable->avatar ?? 'assets/app-assets/images/portrait/small/avatar-s-15.jpg')}}" alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="list-item-body flex-grow-1">
                                    @if(isset($notification['data']['title']))
                                        <p class="media-heading"><span class="fw-bolder">{!! $notification['data']['title'] !!}</p><small class="notification-text"> {!! $notification['data']['desc'] !!}</small>
                                    @else

                                        <p class="media-heading"><span class="fw-bolder">{{trans('file.no_notifications')}}</p>

                                    @endif
                                </div>
                            </div>
                        </a>

                        @empty

                        @endforelse


                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="{{ route('dashboard.notifications.index') }}">
                    {{ trans('admin.read_all_notifications') }} </a></li>
                </ul>
            </li>
            @endif



          <li class="list-inline-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="mx-2 w30" src="{{ asset(Auth::user()->avatar ??'assets/new/images/avatar.png') }}">
              <span class="d-none d-sm-inline">{{ Auth::user()->fullname ?? ''}}</span>


              <i class="fas fa-ellipsis-v mx-2"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('dashboard.profile.index')}}"><i class="me-50" data-feather="user"></i> {{trans('admin.profile')}}</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('dashboard.profile.setting')}}"><i class="far fa-cog"></i> {{trans('file.account_setting')}}</a>
                </li>


              <li><hr class="dropdown-divider"></li>
              <li>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="me-50" data-feather="power" ></i> {{trans('admin.logout')}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>







