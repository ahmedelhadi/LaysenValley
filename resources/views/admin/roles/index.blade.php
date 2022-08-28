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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.roles')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.roles')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    @can('roles create')
                    <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">{{ trans('admin.create') }}</a>
                    @endcan


                    @if(Request::has('trashed'))
                        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">{{ trans('admin.items') }}</a>
                    @else
                        @can('roles forceDelete')
                        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}?trashed">{{ trans('admin.deleted_items') }}</a>
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
                            <h4 class="card-title">{{trans('admin.roles')}}</h4>
                        </div>


                        @if (Session::has('message'))
                        <div class="p-1">
                            <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                <div class="alert-body">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                        @endif


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('admin.id') }}</th>
                                        <th>{{ trans('admin.role_name') }}</th>
                                        <th>{{ trans('admin.users_in_role') }}</th>
                                        <th>{{ trans('admin.action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ count($role->users) }}</td>
                                            <th class="actions" width="200">
                                                <a class="btn btn-sm" href="{{ route('admin.roles.show', $role->id) }}"><i class="far fa-eye"></i></a>

                                                @can('roles edit')
                                                    @if ($role->id != 1)
                                                        <a class="btn btn-sm" href="{{ route('admin.roles.edit', $role->id) }}"><i class="far fa-edit"></i></a>
                                                    @endif
                                                @endcan

                                                @can('roles delete')
                                                    @unless(in_array($role->id, [1, 2, 3, 4]))
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id], 'style' => 'display:inline' , 'onsubmit' => "return confirm('Are you sure ?')" ]) !!}
                                                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn  btn-sm']) !!}
                                                        {!! Form::close() !!}
                                                    @endunless
                                                @endcan
                                                </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>



                            </div>

                            <div class="col-12 d-flex justify-content-center">

                                    {{$roles->appends(request()->input())->links('pagination::bootstrap-4')}}
                            </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

