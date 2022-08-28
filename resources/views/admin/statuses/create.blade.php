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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.statuses')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.statuses')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    @can('statuses create')
                    <a class="btn btn-primary" href="{{ route('admin.statuses.create') }}">{{ trans('admin.create') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('admin.statuses')}}</h4>
                            </div>
                            <div class="card-body">


                            {!! Form::open(['route' => 'admin.statuses.store', 'method' => 'POST', 'files' => true , 'class' => 'form form-horizontal' ]) !!}

                            @include('admin.statuses.parts._fields')


                            <div class="mb-2">
                                {!! Form::submit(trans('admin.create'), ['class' => 'btn btn-primary']) !!}
                            </div>


                            {{ Form::close() }}


                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('jquery')

@endsection
