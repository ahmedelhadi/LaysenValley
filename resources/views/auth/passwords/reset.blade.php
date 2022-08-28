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
                <div class="d-flex col-lg-8 offset-lg-2 align-items-center  auth-bg px-2 p-lg-2 shadow-lg">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12  mx-auto">



                    <form method="POST" action="{{ route('password.update') }}" class="auth-login-form mt-2" autocomplete="off">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="off" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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
