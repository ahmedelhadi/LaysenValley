@extends('layouts.dashboard')

@section('style')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/new/vendors/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/new/vendors/slick/slick-theme.css') }}"/>

@endsection

@section('content')

<div class="container mt-1">

    <nav class="mt-4"  aria-label="breadcrumb">
        <ol class="breadcrumb">
        	@if(Auth::user()->partner)
            <li class="breadcrumb-item"><a href="#">{{ Auth::user()->partner->getTitle() ?? ''}}</a></li>
            @else
            <li class="breadcrumb-item"><a href="#">{{ trans('file.info_dashboard')}}</a></li>

            @endif

            <li class="breadcrumb-item active"><a href="#">{{ trans('file.info_dashboard')}}</a></li>
        </ol>
    </nav>
	@if(Auth::user()->partner)
    <div id="partner-info" class="row mb-3">
    	<div class="d-flex pt-2 pb-4 border-bottom">
    		<div class="col-1">
    			<img class=" img90 rounded-circle" src="{{ Auth::user()->partner->logo ?? asset('assets/new/images/d-img.png') }}">
    		</div>
    		<div class="col pt-3">
    			<h4 class="text-dark">{{Auth::user()->partner->getTitle() ?? ''}}</h4>
    			<ul class="list-inline">
    				<li class="list-inline-item">
    					<a href="{{Auth::user()->partner->url ?? '#'}}"><i class="fal fa-globe"></i></a>
    				</li>
    				<li class="list-inline-item">
    					<a href="{{Auth::user()->partner->url ?? '#'}}"><i class="fab fa-twitter"></i></a>
    				</li>
    			</ul>
    		</div>
    	</div>
    </div>
	@endif

     
	<div id="lastProjects" class="section lastProjects mb-5">

		<div class="title clearfix mb-4">
			<h4 class="d-inline-block ">{{trans('file.last_projects')}}</h4>
		</div>
		<div class="row">

			@if(count($projects) > 0)
				<div class="projects-carousel">
					@foreach($projects as $project)
					<div class="mx-2">
						@include('dashboard.projects.parts._item')
					</div>
					@endforeach
				</div>
			@else
				<div class="col-12">
					<div class="card border-light">
					  	<div class="card-body">
					    	<p class="card-text text-center">{{ trans('file.no_projects') }}</p>
					  	</div>
					</div>
				</div>
			@endif

		</div>

	</div>
	
</div>

@if(Auth::user()->penddingProjects->count())
	@include('dashboard.parts._pendding_projects_modal');
@endif

@endsection

@section('jquery')


    <script type="text/javascript" src="{{ asset('assets/new/vendors/slick/slick.min.js')}}"></script>


    <script type="text/javascript">
    	
    	$(document).ready(function() {

           $('.projects-carousel').slick({
                rtl: true,
                dots: false,
                infinite: false,
                nextArrow :'<button type="button" class="slick-prev"><i class="fal fa-angle-right"></i></button>',
                prevArrow :'<button type="button" class="slick-next"><i class="fal fa-angle-left"></i></button>',
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
                ]
            });
        });


    </script>

@endsection
