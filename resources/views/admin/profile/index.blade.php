@extends('layouts.admin')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.profile')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.profile')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.profile')}}</h4>
                        </div>

                        <div class="card-body">


                            @if (Session::has('message'))
                            <div class="p-1">
                                <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                    <div class="alert-body">
                                        {{ Session::get('message') }}
                                    </div>
                                </div>
                            </div>
                            @endif


                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <div class="alert-body">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    </div>
                                </div>
                            @endif


                            {{ Form::model(Auth::user(), array('route' => array('admin.users.update', Auth::user()->id), 'method' => 'PUT','files'=>true)) }}


                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif



                                <div class="mb-2">
                                    {!! Form::label('first_name', trans('admin.first_name')  ,['class'=>'form-label']) !!}
                                    {!! Form::text('first_name',  Auth::user()->first_name, array('placeholder' => trans('admin.first_name'),'class' => 'form-control')) !!}
                                </div>
                                <div class="mb-2">
                                    {!! Form::label('last_name', trans('admin.last_name')  ,['class'=>'form-label']) !!}
                                    {!! Form::text('last_name', Auth::user()->last_name, array('placeholder' => trans('admin.last_name'),'class' => 'form-control')) !!}
                                </div>


                                <div class="mb-2">
                                    {!! Form::label('email', trans('admin.email')  ,['class'=>'form-label']) !!}
                                    {!! Form::text('email', Auth::user()->email, array('placeholder' => trans('admin.email'),'class' => 'form-control','disabled'=>'disabled')) !!}
                                </div>


                                <div class="mb-2">
                                    {!! Form::label('mobile', trans('admin.mobile')  ,['class'=>'form-label']) !!}
                                    {!! Form::text('mobile',  Auth::user()->mobile, array('placeholder' => trans('admin.mobile'),'class' => 'form-control')) !!}
                                </div>

                                <div class="mb-2">
                                    {!! Form::label('password', trans('admin.password')  ,['class'=>'form-label']) !!}
                                    {!! Form::password('password', array('placeholder' => trans('admin.password'),'class' => 'form-control')) !!}
                                </div>
                                <div class="mb-2">
                                    {!! Form::label('confirm_password', trans('admin.confirm_password')  ,['class'=>'form-label']) !!}
                                    {!! Form::password('confirm-password', array('placeholder' => trans('admin.confirm_password'),'class' => 'form-control')) !!}
                                </div>



                                <div class="mb-2">
                                    {!! Form::label('avatar', trans('admin.avatar')  ,['class'=>'form-label']) !!}
                                    {!! Form::file('avatar', array('id' =>'inputGroupFile01', 'class' => 'custom-file-input')) !!}
                                </div>


                                <div class="mb-2">
                                    {!! Form::submit(trans('admin.save'),
                                      array('class'=>'btn btn-primary')) !!}
                                </div>


                            {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('jquery')

<script type="text/javascript">


</script>
@endsection
