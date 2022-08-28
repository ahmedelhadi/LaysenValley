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


	                @if(Request::has('trashed'))
						<a class="btn btn-secondary" href="{{ route('admin.statuses.index') }}">{{ trans('admin.items') }}</a>
		            @else
		                @can('statuses forceDelete')
						<a class="btn btn-secondary" href="{{ route('admin.statuses.index') }}?trashed">{{ trans('admin.deleted_items') }}</a>
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
				            <h4 class="card-title">{{trans('admin.statuses')}}</h4>
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
				                        <th scope="col">#</th>
				                        <th scope="col">{{trans('admin.status_name')}}</th>
				                        <th scope="col">{{trans('admin.item_type')}}</th>
				                        <th scope="col">{{trans('admin.visibility')}}</th>
				                        <th scope="col">{{trans('admin.appearance')}}</th>
				                        <th scope="col">{{trans('admin.actions')}}</th>
				                    </tr>
				                </thead>



				                <tbody>
				                    @if(count($statuses) > 0)
				                        @foreach($statuses as $status)
				                        <tr>
				                            <td>{{$status->id}}</td>
				                            <td>{{$status->getTitle() }} </td>
				                            <td>{{$status->type }} </td>


				                            <td> 
				                                <span
				                                    class="badge {{ $status->is_active === 1 ? 'bg-success' : 'bg-danger' }} ">
				                                    {{ $status->is_active === 1 ? trans('admin.is_active') : trans('admin.not_active') }}
				                                </span>

				                            </td>


				                            <td> <span class="badge text-black-50" style="background: {{$status->color}}"> {{$status->getTitle() }}</span> </td>


				                            <td class="actions" width="200">



                                                    @if ($status->trashed())
                                                        @can('statuses forceDelete')
                                                            {{ Form::open(['route' => ['admin.statuses.forceDelete', $status->id], 'class' => 'd-inline' ,'onsubmit' => "return confirm('".trans('admin.are_you_sure')."')"]) }}
                                                            {{ Form::hidden('_method', 'DELETE') }}
                                                            {!! Form::button('<i data-feather="delete"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.delete')]) !!}
                                                            {{ Form::close() }}
                                                        @endcan


                                                        @can('statuses restore')
                                                            {{ Form::model($status, ['route' => ['admin.statuses.restore', $status->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-warning']) }}

                                                            {!! Form::button('<i data-feather="refresh-cw"></i>  ', ['class' => 'btn p-0 btn-block', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.restore')]) !!}

                                                            {{ Form::close() }}
                                                        @endcan


                                                    @else
                                                    {{-- 
                                                        @can('statuses view')
                                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.statuses.show',$status->id) }}">
                                                            <i class="fas fa-eye"></i>
                                                            
                                                        </a>
                                                        @endcan
													--}}

                                                        @if(Auth::user()->isAdmin() || $user->isEditable($user->id))

                                                        @can('statuses edit')
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.statuses.edit',$status->id) }}">
                                                            <i class="fas fa-pencil"></i>
                                                        </a>
                                                        @endcan

                                                        @can('statuses delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.statuses.destroy', $status->id] , 'class' =>  'd-inline','onsubmit' => "return confirm('".trans('admin.are_you_sure')."')" ]) !!}

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
				            {{$statuses->appends(request()->input())->links('pagination::bootstrap-4')}}
				        </div>


			        </div>
			    </div>
			</div>
	    </div>
	</div>

</div>
@endsection