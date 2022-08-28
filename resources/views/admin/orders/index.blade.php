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
	                    <h2 class="content-header-title float-start mb-0">{{trans('admin.orders')}}</h2>
	                    <div class="breadcrumb-wrapper">
	                        <ol class="breadcrumb">
	                            <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
	                            </li>
	                            <li class="breadcrumb-item active">{{trans('admin.orders')}}
	                            </li>
	                        </ol>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="content-header-right text-md-end col-md-3 col-12 d-md-order ">
	            <div class="mb-1 breadcrumb-right">
	                @can('orders create')
					<a class="btn btn-primary" href="{{ route('admin.orders.create') }}">{{ trans('admin.create') }}</a>
	                @endcan


	                @if(Request::has('trashed'))
						<a class="btn btn-secondary" href="{{ route('admin.orders.index') }}">{{ trans('admin.items') }}</a>
		            @else
		                @can('orders forceDelete')
						<a class="btn btn-secondary" href="{{ route('admin.orders.index') }}?trashed">{{ trans('admin.deleted_items') }}</a>
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
				            <h4 class="card-title">{{trans('admin.orders')}}</h4>
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
				                        <th scope="col">{{trans('admin.title')}}</th>
				                        <th scope="col">{{trans('admin.company')}}</th>
				                        <th scope="col">{{trans('admin.email')}}</th>
				                        <th scope="col">{{trans('admin.phone')}}</th>
				                        <th scope="col">{{trans('admin.status')}}</th>
				                        <th scope="col">{{trans('admin.actions')}}</th>
				                    </tr>
				                </thead>



				                <tbody>
				                    @if(count($orders) > 0)
				                        @foreach($orders as $order)
				                        <tr>
				                            <td>{{$order->id}}</td>
				                            <td>{{$order->name }} </td>
				                            <td>{{$order->company }} </td>
				                            <td>{{$order->email }} </td>
				                            <td>{{$order->mobile }} </td>


				                            <td> 
				                                <span
				                                    class="badge {{ $order->is_active === 1 ? 'bg-success' : 'bg-danger' }} ">
				                                    {{ $order->is_active === 1 ? trans('admin.is_active') : trans('admin.not_active') }}
				                                </span>

				                            </td>




				                            <td class="actions" width="200">

			                                    @if ($order->trashed())
                                                    @can('orders forceDelete')
                                                        {{ Form::open(['route' => ['admin.orders.forceDelete', $order->id], 'class' => 'd-inline' ,'onsubmit' => "return confirm('".trans('admin.are_you_sure')."')"]) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        {!! Form::button('<i data-feather="delete"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.delete')]) !!}
                                                        {{ Form::close() }}
                                                    @endcan


                                                    @can('orders restore')
                                                        {{ Form::model($order, ['route' => ['admin.orders.restore', $order->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-warning']) }}

                                                        {!! Form::button('<i data-feather="refresh-cw"></i>  ', ['class' => 'btn p-0 btn-order', 'data-toggle' => 'tooltip', 'type' => 'submit', 'title' => trans('admin.restore')]) !!}

                                                        {{ Form::close() }}
                                                    @endcan


                                                @else

                                                
			                                    	@can('orders view')
			                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.orders.show',$order->id) }}">
			                                            <i class="fas fa-eye"></i>
			                                            
			                                        </a>
			                                        @endcan
												


			                                    	@can('orders edit')
			                                        <a class="btn btn-sm btn-info" href="{{ route('admin.orders.edit',$order->id) }}">
			                                            <i class="fas fa-pencil"></i>
			                                        </a>
			                                        @endcan

			                                        @can('orders delete')
			                                        	{!! Form::open(['method' => 'DELETE', 'route' => ['admin.orders.destroy', $order->id] , 'class' =>  'd-inline','onsubmit' => "return confirm('".trans('admin.are_you_sure')."')" ]) !!}

			                                			{!! Form::button('<i class="far fa-times-circle"></i> 
			                                            ', ['class' => 'btn btn-sm btn-danger ' ,'type'=>'submit']) !!}
			                                			{!! Form::close() !!}

					                                @endif




												@endif

				                            </td>
				                        </tr>
				                        @endforeach
				                    @else
				                        <tr>
				                            <td colspan="4" class="text-center">
				                                {{trans('admin.no_items')}}
				                            </td>
				                        </tr>

				                    @endif
				                </tbody>


				            </table>
					    </div>

				        <div class="col-12 d-flex justify-content-center">
				            {{$orders->appends(request()->input())->links('pagination::bootstrap-4')}}
				        </div>


			        </div>
			    </div>
			</div>
	    </div>
	</div>

</div>
@endsection