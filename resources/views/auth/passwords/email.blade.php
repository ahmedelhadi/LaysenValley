@extends('layouts.login')

@section('content')

    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">

            <div class="col-12 col-sm-6 login-bg pt-5 d-flex align-items-center justify-content-center">
                <div class="p-lg-3 d-flex align-items-center mb-5">
                    <div class="text-white">
                        
                        {!! trans('file.welcome_in' ,['site'=> config('app.name', 'Laravel')]) !!}
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 d-flex align-items-center">

                <!-- /Left Text-->
                <!-- Login-->
                <div class="d-flex col-lg-8 offset-lg-2 align-items-center  auth-bg px-2 p-lg-3 shadow">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12  mx-auto">


                <!-- Brand logo-->
                <div class="mb-3 text-center">
                <a class="" href="{{route('dashboard.dashboard.index')}}">
                    <img height="28" src="{{ asset('assets/images/logo.png') }}">
                </a>
                </div>
                <!-- /Brand logo-->



                    @if (session('status'))
                        <div class="alert alert-success p-1" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="auth-login-form mt-2" autocomplete="off">
                        @csrf

                        <div class=" mb-3">
                            <label for="email" class="col-md-4 col-form-label ">{{trans('file.email')}}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('file.send')}}
                                </button>
                            </div>
                        </div>
                    </form> 

                    </div>
                </div>
            <!-- /Login-->
            </div>
        </div>
    </div>
@endsection
