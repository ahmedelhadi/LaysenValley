@extends('layouts.login')

@section('style')

@endsection


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



                <h2 class="card-title fw-bold mb-1 text-center">{{trans('file.register')}}</h2>


                    <form method="POST" action="{{ route('register') }}" class="auth-login-form mt-2" autocomplete="off">
                        @csrf


                        <div class="row ">

                            <div class="mb-1">
                                <label class="form-label" for="email">{{trans('file.name_ar')}}</label>
                                <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name_ar') }}" required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">

                            <div class="mb-1">
                                <label class="form-label" for="email">{{trans('file.email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">


                            <div class="mb-1">
                                <label class="form-label" for="email">{{trans('file.password')}}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <div class="mb-1">
                                <label class="form-label" for="email">{{trans('file.password_confirmation')}}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-5 mb-1">
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="{{trans('file.enter_captcha')}}" name="captcha">
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="captcha">
                                   <span>{!! captcha_img() !!}</span>
                                </div>
                            </div>
                            <div class="col-md-3 mb-1">
                                   <button type="button" class="btn btn-success"><i class="fas fa-sync" id="reload"></i></button>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="mb-1">
                                <button type="submit" class="btn btn-primary w-100 waves-effect waves-float waves-light">
                                    {{trans('file.register')}}
                                </button>
                            </div>
                        </div>
                    </form>


                    <p class="mt-2">
                        {!! trans('file.if_you_have_account_you_can_login_from_here') !!}
                    </p>

                    </div>
                </div>
            <!-- /Login-->
            </div>
        </div>
    </div>
@endsection


@section('jquery')


<script type="text/javascript">
    $('#reload').click(function(){
      $.ajax({
         type:'GET',
         url:'reload-captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });
</script>
</script>

@endsection
