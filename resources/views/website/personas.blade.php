@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
	
	<div class="container-fluid">

		<div class="row big-top">
			<div class="col-md-10 hidden-xs">
				<div class="row">

					<div class="col-md-4">
						<h1 class="text-center font-light top top-5">
						<br><br>
							<b>Top personas</b> <br>
							que no te pagan
						</h1>
					</div>
					<div class="col-md-8">
						
						@foreach($personas as $persona)
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									@if($loop->index <= 2)
										<img src="/img/icons/gema-{{$loop->index+1}}.png" class="img-top-5" alt="">
									@else
										<img src="{{$persona->logo}}" class="img-top-5 img-circl" alt="">
									@endif
									<div class="top-5-item   col-md-7 mini-top">
										<b>{{ $loop->index + 1 .".".$persona->nombre }} </b>
										<br>
										Se ha hecho pato con: 
									</div>
									<div class="col-md-3 top-5-item-2 text-center mini-top">
										<b>{{ "$".number_format($persona->total_deudas) }}</b>
									</div>
									<div class="col-md-2 top-5-item-3  mini-top">
										<a href="/persona/{{$persona->nombre}}/casos">
											<b>Ver <br> casos</b>
										</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				
					
				</div>
			</div>
			<div class="col-xs-12 visible-xs">
				<div class="row">

					<div class="col-md-4">
						<h1 class="text-center font-light top top-5">
						<br><br>
							<b>Top personas</b> <br>
							que no te pagan
						</h1>
					</div>
					<div class="col-xs-12">
						
						@foreach($personas as $persona)
							<div class="row">
								<div class="col-xs-12 mini-top">
									@if($loop->index <= 2)
										<img src="/img/icons/gema-{{$loop->index+1}}.png" class="img-top-5" alt="">
									@else
										<img src="{{$persona->logo}}" class="img-top-5 img-circl" alt="">
									@endif
									<div class="top-5-item   col-md-7 mini-top text-center">
										<b>{{ $loop->index + 1 .".".$persona->nombre }} </b>
										<br>
										Se ha hecho pato con: 
									</div>
									<div class="col-xs-12  text-center ">
										<h4>{{ "$".number_format($persona->total_deudas) }}</h4>
									</div>
									<div class="col-xs-8 col-xs-offset-2 text-center">
										<a  class="btn-upload btn-100 col-xs-12" href="/persona/{{$persona->nombre}}/casos">
											
											<h4>Ver casos</h4>
										</a>
										<br>
									</div>

								</div>
							</div>
						@endforeach
					</div>
				
					
				</div>
			</div>
		</div>
		<div class="bot"></div>
	
	</div>


	
@endsection

@section('scripts')
	
	<script>
		$(document).ready(function()
		{	
			$(window).resize(function()
			{
				var width = $(".search-item img").width();
				$(".search-item img").height(width);	
			});

			var width = $(".search-item img").width();
			$(".search-item img").height(width);
		});
	</script>
{{-- 	<script src="/js/animations.js"></script> --}}

@endsection


@section('footer')
	@parent
@endsection



