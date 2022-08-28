@extends('layouts.front')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('content')

    
@if($page)

	@if($page->slug == 'business')

		<section id="page-section" class="section pt-5 pb-5 min-vh-100">

			<div class="container ">
				<div class="d-flex justify-content-evenly align-items-center">
					<div class="col-12 col-sm-6 page-title text-center mb-2 mt-5 text-center">
						<h5 class="text-uppercase pb-3">{{$page->getSubTitle()}}</h5>
					</div>
		
				</div>
			</div>
			<div class="container vh-75 ">

				@if(count($page->blocks) > 0)

					@foreach($page->blocks as $block)

						@if($block->slug == 'business-analytics')
							<div class="d-flex justify-content-evenly align-items-center mt-5  h-100">
								
								@if(count($block->attributes)>0)

									@foreach($block->attributes as $attribute)

									<div class="col-12 col-sm-3 text-center">
										<img class="mb-3 " src="{{url($attribute->image ?? 'assets/images/Ellipse.png')}}" alt="">
										<div>
											<p class="mb-1"><small >{{$attribute->getSubTitle()}}</small></p>
											<h2 class="mb-1">{{$attribute->counter}}</h2>
											<small>{{$attribute->getTitle()}}</small>
										</div>

									</div>
									@endforeach
								@endif
							</div>
						@endif
					@endforeach

				@endif

			</div>
		</section>

	@elseif($page->slug == 'taste')

		<section id="page-section" class="section pt-5 pb-5 ">

			<div class="container ">
				<div class="d-flex justify-content-evenly align-items-center">
					<div class="col-12 col-sm-6 page-title text-center mb-2 mt-5">
						<h5 class="text-uppercase pb-3 text-center">{{$page->getSubTitle()}}</h5>
					</div>
		
				</div>
			</div>
			<div class="container mt-5">

				@if(count($partners) > 0)
					<div class="d-flex flex-wrap justify-content-center">
						@foreach($partners as $partner)
							<div class="col-12 col-sm-3 text-center mb-5 mt-5">
								<img class="mb-2" src="{{url($partner->logo ?? 'assets/images/Ellipse.png')}}" alt="">
							</div>
						@endforeach
					</div>
				@endif

			</div>

		</section>

	@elseif($page->slug == 'live')

		<section id="page-section" class="section pt-5 pb-5 min-vh-100">

			<div class="container ">
				<div class="d-flex justify-content-evenly align-items-center">
					<div class="col-12 col-sm-6 page-title text-center mb-5 mt-5 text-center">
						<h5 class="text-uppercase pb-3">{{$page->getSubTitle()}}</h5>
					</div>
		
				</div>
			</div>
			<div class="container vh-75 ">

				@if(count($page->blocks) > 0)

				@foreach($page->blocks as $block)

					@if($block->slug == 'live-analytics')
						<div class="d-flex justify-content-evenly align-items-center  h-100">
							
							@if(count($block->attributes)>0)

								@foreach($block->attributes as $attribute)

								<div class="col-12 col-sm-4 text-center p-3">
									<img class="img-fluid mb-5" src="{{url($attribute->image ?? 'https://fakeimg.pl/350x200/?text=World&font=lobster')}}">
									<div>
										<img class="mb-3" src="{{url($attribute->icon ?? 'images/Ellipse.png')}}" alt="">
										<p class="mb-1"><small >{{$attribute->getTitle()}}</small></p>
									</div>
				
								</div>
				
			
								@endforeach
							@endif
						</div>
					@endif
				@endforeach

			@endif


			</div>
		</section>

	@elseif($page->slug == 'contact-us')

	<section id="page-section" class="section pt-5 pb-5 min-vh-100">

		<div class="container ">
			<div class="d-flex justify-content-evenly align-items-center">
				<div class="col-12 col-sm-6 page-title text-center mb-2 mt-5 text-center">
					<h5 class="text-uppercase pb-3">{{trans('file.contact_us')}}</h5>
					<h3 class="mb-5 mt-4 ">{!! trans('file.need_to_get_in_touch_with_us') !!} </h3>
				</div>
	
			</div>
		</div>
		<livewire:front.inquiry.index />

	</section>

	@else
		<section id="page-section" class="section pt-5 pb-5 ">

			<div class="container ">
				<div class="d-flex justify-content-evenly align-items-center">
					<div class="col-12 col-sm-6 page-title text-center mb-2 mt-5">
						<h5 class="text-uppercase pb-3 text-center">{{$page->getTitle()}}</h5>
					</div>
		
				</div>
			</div>
			<div class="container mt-5 mb-5">
				{{$page->getDesc()}}
			</div>
		</section>
	
	@endif


@else
	غير صحيح
@endif

@endsection


@section('jquery')
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/sweetalert2.all.js')}}" type="text/javascript"></script>
@endsection
