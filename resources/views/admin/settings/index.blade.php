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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.settings')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.settings')}}
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
                            <h4 class="card-title">{{trans('admin.settings')}}</h4>
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




                            {!! Form::open(['route' => 'admin.settings.store', 'method' => 'POST']) !!}

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                @if(count($settings) > 0)
                                @foreach($settings as $setting)
                                    <div class="mb-2">
                                        {!! Form::label('name', $setting->name, ['class' => 'form-label text-uppercase']  ) !!}
        
                                        {!! Form::text('items['.$setting->name.']', $setting->value, ['required', 'class' => 'form-control required']) !!}
        
                                    </div>
                                @endforeach
                            @endif
        





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
