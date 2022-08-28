@extends('layouts.front')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection

@section('content')


<section id="page-section" class="section pt-5 pb-5 min-vh-100">

	<div class="container ">
		<div class="d-flex justify-content-evenly align-items-center">
			<div class="col-12 col-sm-6 page-title text-center mb-2 mt-5 text-center">
				<h5 class="text-uppercase pb-3">{{trans('file.event_registeration')}}</h5>
				<h3 class="mb-5 mt-4 text-uppercase ">{!! trans('file.event_registeration_desc') !!} </h3>
			</div>

		</div>
	</div>
	<livewire:front.order.index />

</section>



@endsection


@section('jquery')
    <script src="{{ asset('assets/app-assets/vendors/js/extensions/sweetalert2.all.js')}}" type="text/javascript"></script>
@endsection
