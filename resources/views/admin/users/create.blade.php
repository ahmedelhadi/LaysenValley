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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.users')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.users')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    @can('users create')
                    <a class="btn btn-primary" href="{{ route('admin.users.create') }}">{{ trans('admin.create') }}</a>
                    @endcan


                    @if(Request::has('trashed'))
                        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}">{{ trans('admin.items') }}</a>
                    @else
                        @can('users forceDelete')
                        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}?trashed">{{ trans('admin.deleted_items') }}</a>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.users')}}</h4>
                        </div>

                        <div class="card-body">


                            @if (Session::has('message'))
                            <div class="p-1">
                                <div class="alert alert-{{ Session::get('status') }}" type="alert">
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


                            {!! Form::open(array('route' => 'admin.users.store','method'=>'POST','files'=>true)) !!}

                            @include('admin.users.parts._fields')

                            <div class="mb-2">
                                {!! Form::submit(trans('admin.create'), array('class'=>'btn btn-primary')) !!}
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
