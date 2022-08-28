@extends('layouts.login')

@section('content')

    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">

            <div class="col-12 col-sm-6 login-bg pt-5 d-flex align-items-center justify-content-center">
                <div class="p-lg-3 d-flex align-items-center mb-5">
                    <div class="text-white">
                        
                        <div class="mb-3 text-center">
                            <a class="" href="{{route('dashboard.dashboard.index')}}">
                                <img height="45" src="{{ asset('assets/images/logo.png') }}">
                            </a>
                        </div>
    
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 d-flex align-items-center">

                <!-- /Left Text-->
                <!-- Login-->
                <div class="d-flex col-lg-8 offset-lg-2 align-items-center  auth-bg px-2 p-lg-3 shadow">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12  mx-auto">



                <h2 class="card-title fw-bold mb-1 text-center">{{trans('file.login')}}</h2>


                        <form class="auth-login-form mt-2" action="{{ route('login') }}"" method="POST">
                            @csrf
                            <div class="mb-1">
                                <label class="form-label" for="login-email">{{trans('file.email')}}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="mb-1">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="login-password">{{trans('file.password')}}</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">


                                    <input id="password" type="password" id="login-password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="off"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                            </div>
                            <div class="mb-1">

                                <div class="d-flex justify-content-between">


                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember-me"> {{trans('file.rememberme')}}</label>
                                    </div>


                                    <a href="{{ route('password.request') }}"><small>{{trans('file.forget_password')}}</small></a>

                                </div>

                            </div>
                            <div class="mt-1 text-center">
                                <button class="btn btn-primary " tabindex="4">{{trans('file.sign_in')}}</button>
                            </div>
                        </form>

                        <p class="mt-2">
                            {!! trans('file.if_you_dont_have_account_you_can_register_from_here') !!}
                        </p>
                    </div>
                </div>
                <!-- /Login-->

            </div>
        </div>
    </div>

@endsection
