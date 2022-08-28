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



                            @if (Session::has('message'))
                            <div class="p-1">
                                <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                    <div class="alert-body">
                                        {{ Session::get('message') }}
                                    </div>
                                </div>
                            </div>
                            @endif



                            {{ Form::open(['action' => 'App\Http\Controllers\Admin\UserController@index','method' => 'get']) }}
                                <div class="card-body row">
                                    <div class="col-12 col-sm-3 mb-2">
                                        {!! Form::label('role_id', trans('admin.role'))!!}

                                        {!!Form::select('role_id', $roles->pluck('name','id'), Request::get('role_id'), ['id' => 'role_id','class' => 'form-control','placeholder'=>trans('admin.role')]) !!}
                                    </div>
                                    
                                    <div class="col-12 col-sm-3 mb-2">
                                        {!! Form::label('email', trans('admin.email'))!!}

                                        {!!Form::text('email',Request::get('email'), ['id' => 'email','class' => 'form-control','placeholder'=>trans('admin.email')  ]) !!}
                                    </div>

                                    <div class="col-12 col-sm-3 mb-2">
                                        {!! Form::label('mobile', trans('admin.mobile'))!!}

                                        {!!Form::text('mobile',Request::get('mobile'), ['id' => 'mobile','class' => 'form-control','placeholder'=>trans('admin.mobile')  ]) !!}
                                    </div>
                                    
                                    <div class="col-12 col-sm-1 mb-2 pt-2">
                                        {!! Form::button('<i class="fas fa-filter"></i>',   array('class'=>'btn btn-primary','id'=>'search-button', 'type'=>'submit')) !!}

                                    </div>
                                </div>
                            {{ Form::close() }}

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('admin.user_name')}}</th>
                                            <th scope="col">{{trans('admin.email')}}</th>
                                            <th scope="col">{{trans('admin.mobile')}}</th>
                                            <th scope="col">{{trans('admin.tbl_role')}}</th>
                                            <th scope="col">{{trans('admin.actions')}}</th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        @if(count($users) > 0)
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->fullname }} </td>
                                                <td>{{$user->email }} </td>
                                                <td>{{$user->mobile }} </td>

                                                <td>{{$user->roles->first()->name ?? '' }} </td>
                                                <td class="actions" width="200">


                                                    @if ($user->trashed())
                                                        @can('users forceDelete')
                                                            {{ Form::open(['route' => ['admin.users.forceDelete', $user->id], 'class' => 'd-inline' ,'onsubmit' => "return confirm('".trans('admin.are_you_sure')."')"]) }}
                                                            {{ Form::hidden('_method', 'DELETE') }}
                                                            {!! Form::button('<i data-feather="delete"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.delete')]) !!}
                                                            {{ Form::close() }}
                                                        @endcan


                                                        @can('users restore')
                                                            {{ Form::model($user, ['route' => ['admin.projects.restore', $user->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-warning']) }}

                                                            {!! Form::button('<i data-feather="refresh-cw"></i>  ', ['class' => 'btn p-0 btn-block', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.restore')]) !!}

                                                            {{ Form::close() }}
                                                        @endcan


                                                    @else
                                                        @can('users view')
                                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.users.show',$user->id) }}">
                                                            <i class="fas fa-eye"></i>
                                                            
                                                        </a>
                                                        @endcan


                                                        @if(Auth::user()->isAdmin() || $user->isEditable($user->id))

                                                        @can('projects edit')
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.users.edit',$user->id) }}">
                                                            <i class="fas fa-pencil"></i>
                                                        </a>
                                                        @endcan

                                                        @can('projects delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id] , 'class' =>  'd-inline','onsubmit' => "return confirm('".trans('admin.are_you_sure')."')" ]) !!}

                                                            {!! Form::button('<i class="far fa-times-circle"></i> 
                                                            ', ['class' => 'btn btn-sm btn-danger ' ,'type'=>'submit']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan


                                                        @endif




                                                    @endif




                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    {{trans('admin.no_items')}}
                                                </td>
                                            </tr>

                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                {{$users->appends(request()->input())->links('pagination::bootstrap-4')}}
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection