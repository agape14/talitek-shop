@extends('frontend.layouts.master')

@section('title', config('app.name', 'Talitek') . ' || Nosotros')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">Inicio<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">Nosotros</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settingprimero = DB::table('settings')->first();
								$settings=DB::table('settings')->get();
							@endphp
							<h3>Bienvenido <span>{{$settingprimero->entidad}}</span></h3>
							<p>@foreach($settings as $data)
								 {{$data->short_des}} <br>
								 {{$data->description}}
								 @endforeach
							</p>
							<div class="button">
								{{--<a href="{{route('blog')}}" class="btn primary">Our Blog</a>--}}
								<a href="{{route('contact')}}" class="btn primary">Contactanos</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							<div class="button">
								<a href="{{$settingprimero->urlvideo}}" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div>
							<img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		@include('frontend.layouts.shopservice')
	</section>
	<!-- End Shop Services Area -->

	<!-- Start Shop Newsletter  -->
   {{--<section class="shop-newsletter section">
    @include('frontend.layouts.newsletter')
</section>--}}
    <!-- End Shop Newsletter -->
@endsection
