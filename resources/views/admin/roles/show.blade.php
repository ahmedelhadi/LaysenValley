@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title text-uppercase">{{trans('admin.roles')}}</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        @can('roles create')
                        <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">{{ trans('admin.create') }}</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Tables start -->
            <div class=" d-flex flex-wrap">
                <div class="col-12">
                    <div class="card" >
                        <div class="card-header pb-0">
                            <h4 class="card-title"> {{trans('admin.roles')}}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize icon_action_bar"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">

                            @if (Session::has('message'))
                                <div class="alert alert-dismissible alert-{{ Session::get('status') }}">
                                    <button user="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('admin.name') }} :</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('admin.permissions') }} :</strong>
                                @if (!empty($rolePermissions))
                                    @foreach ($rolePermissions as $v)
                                        <label class="label label-success">{{ $v->name }},</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>

@endsection