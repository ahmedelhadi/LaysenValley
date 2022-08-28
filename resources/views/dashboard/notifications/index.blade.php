@extends('layouts.dashboard')

@section('content')



<section id="projects" class="pt-2 pb-2">

    <nav  aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">{{  trans('file.dashboard') }}</a></li>
            <li class="breadcrumb-item active"><a href="#">{{trans('file.notifications')}}</a></li>
        </ol>
    </nav>



	    <h2 class="text-dark mb-4">{{trans('file.notifications')}}</h2>

	<div class="row">

	    @if(count(auth()->user()->notifications) > 0)
        <div class="table-responsive">
            <table class="table  table-borderless">
                <thead>
                    <tr class="bg-light">
                        <th type="col" width="30">#</th>
                        <th type="col" width="250">{{trans('admin.created_at')}}</th>
                        <th type="col" >{{trans('file.title')}}</th>
                        <th type="col" width="150">{{trans('file.actions')}}</th>
                    </tr>
                </thead>


                <tbody>

			        @forelse(auth()->user()->notifications as $notification)
						<tr>

							<td width="30"></td>
							<td width="250">

								@if(!$notification->read_at)
									<i class="fas fa-bell text-success"></i>
								@else
									<i class="far fa-bell text-gray"></i>
								@endif

								{{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d')}}

							</td>
							<td >{!! $notification['data']['title'] ?? 'بدون' !!}</td>
							<td width="150">
								
                            <a class="btn btn-md" href="{{route('dashboard.notifications.show',$notification->id)}}" >
                                <i class="fas fa-eye"></i>
                            </a>   


							</td>
						</tr>

        			@empty
				        <div class="card">
				        	<div class="card-body">
				        	{{trans('file.no_notifications')}}
				        	</div>
				        </div>
			        @endforelse
			    </tbody>
			</table>

    	</div>

    	@endif
    </div>

</section>


@endsection