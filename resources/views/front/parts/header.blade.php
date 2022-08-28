<header>
    <div class="container">

        <nav id="navbar" class="navbar navbar-expand-lg pb-lg-5 pt-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand animate__animated animate__fadeInDown" href="#" >
                    <img src="{{asset('assets/images/logo.png')}}" alt="" width="212" height="55" class="d-inline-block align-text-middle">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto  animate__animated animate__fadeInDown text-uppercase">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }} " aria-current="page" href="{{url('/')}}">{{trans('file.about')}}</a>
                        <a class="nav-link {{ request()->segment(2) == 'business' ? 'active' : '' }}" href="{{url('/pages/business')}}">{{trans('file.business')}}</a>
                        <a class="nav-link {{ request()->segment(2) == 'taste' ? 'active' : '' }}" href="{{url('/pages/taste')}}">{{trans('file.taste')}}</a>
                        <a class="nav-link {{ request()->segment(2) == 'live' ? 'active' : '' }}"  href="{{url('/pages/live')}}">{{trans('file.live')}}</a>
                        <a class="nav-link {{ request()->segment(2) == 'contact-us' ? 'active' : '' }}"  href="{{url('/pages/contact-us')}}">{{trans('file.contact_us')}}</a>

                        @foreach (Config::get('languages') as $lang => $language)
                            @if(App::getLocale() != $lang)
                                <a class="nav-link" href="{{ route('lang.switch', $lang) }}" data-language="{{$lang}}"><i class="flag-icon flag-icon-{{$lang}}"></i> {{$language}}</a>
                            @endif
                        @endforeach
                        <!--a class="nav-link "  href="#"><i class="fa fa-search" aria-hidden="true"></i></a-->
                    </div>
                </div>
            </div>
        </nav>


        @if(isset($page) )

            @if(isset($page->slider))
                <div class="slider vh-100 " data-key="{{$page->slug}}">

                  
                    @if(count($page->slider->slides) > 0)
                        @foreach($page->slider->slides as $slide)
                            <div class="h-100 d-flex justify-content-center align-items-center" style="background: url('{{url($slide->image)}}') no-repeat;background-size: cover;">

                                @if($page->slug == 'taste')

                                <div id="smoke">
                                    <span class="s0"></span>
                                    <span class="s1"></span>
                                    <span class="s2"></span>
                                    <span class="s3"></span>
                                    <span class="s4"></span>
                                    <span class="s5"></span>
                                    <span class="s6"></span>
                                    <span class="s7"></span>
                                    <span class="s8"></span>
                                    <span class="s9"></span>
                                  </div>
                                  {{--
                                <div class="smoke-wrap">
                                    <img class="smoke" src="{{asset('assets/images/smoke.png')}}" alt="smoke">
                                  </div>
                                  <div class="smoke-wrap">
                                    <img class="smoke2" src="{{asset('assets/images/smoke.png')}}" alt="smoke">
                                  </div>
                                  <div class="smoke-wrap">
                                    <img class="smoke3" src="{{asset('assets/images/smoke.png')}}" alt="smoke">
                                  </div>

                                  --}}
                                @endif
                                  
                                <div class="col-12 col-sm-8  text-center animate__animated animate__fadeInUpBig text-white">
                                    <a class="btn-slider btn-{{$page->slug}} text-uppercase" href="{{$slide->url_link}}">
                                        <span>{{$slide->getUrlText()}}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            @else 
            <div class="hero h-100 d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-8  text-center  text-white">
                    <a class="btn-slider style-3 text-uppercase" href="#page-section"> 
                        <span>{{trans('file.stay_connected')}}</span>
                    </a>
                </div>
            </div>

            @endif

        @else
            <div class="hero h-100 d-flex justify-content-center align-items-center">
                    <div class="col-12 col-sm-8  text-center  text-white">
                        <h1 class="mb-3 text-uppercase animate__animated animate__bounceInRight animate__delay-1s">
                            {{trans('file.hero_title')}}
                        </h1>
                        <h2 class="mb-3 text-uppercase animate__animated animate__bounceInLeft animate__delay-2s">
                            {{trans('file.hero_subtitle')}}
                        </h2>

                    </div>
            </div>
        @endif

    </div>
</header>
