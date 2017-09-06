@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')

	<div class="container-fluid">

		<div class="row big-top" id="animate">
			<br class="visible-xs">
			<br class="visible-xs">
			<div class="col-md-9 col-md-offset-1 ">
				<h1 class="font-light">	
					Resultados de la búsqueda
				</h1>
				<br>
				<h2 class="font-light">
					<em>Empresas:</em>
				</h2>
				<div class="row">
					@if($empresas->count() == 0 )
						<h2 class="font-light">
							<em>No encontramos ningún resultado de empresas con la búsqueda "{{ $keyword }}" </em>
						</h2>
					@endif
					@foreach ($empresas as $empresa)
						<div class="col-md-3">
							
							<a href="/empresa/{{$empresa->nombre}}/casos">
								<div class=" text-center top search-item" 
									@mouseleave="setStatus(false, 'empresa-'+{{$empresa->id}})" 
									@mouseenter="setStatus(true, 'empresa-'+{{$empresa->id}})" 
								>
									<div class="detalle hidden animated" id="empresa-{{$empresa->id}}">
										<button class="btn-detalle">
										<i class="fa fa-eye"></i>
										</button>
									</div>
									<img class="img-center img-responsive " src="{{ $empresa->logo }}" alt="">
									<br>
									<h3 class="text-center font-light">
										{!! str_replace($keyword,"<b class='orange'>".$keyword."</b>",$empresa->nombre) !!}
									</h3>

								</div>	
							</a>
						</div>
					@endforeach
				</div>

				<h2 class="font-light top">
					<em>Personas:</em>
				</h2>
				<div class="row">
					@if($personas->count() == 0 )
						<h2 class="font-light">
							<em>No encontramos ningún resultado de personas con la búsqueda "{{ $keyword }}" </em>
						</h2>
					@endif
					@foreach ($personas as $persona)
						
						<div class="col-md-3">
							<a href="/persona/{{$persona->nombre}}/casos">
								<div class=" text-center top search-item"
										@mouseleave="setStatus(false, 'persona-'+{{$persona->id}})" 
										@mouseenter="setStatus(true, 'persona-'+{{$persona->id}})" 
								>
									<div class="detalle hidden animated" id="persona-{{$persona->id}}">
										<button class="btn-detalle">
										<i class="fa fa-eye"></i>
										</button>
									</div>
									<img class="img-center img-responsive " src="{{ $persona->logo }}" alt="">
									<br>
									<h3 class="text-center font-light ">
										{!! str_replace($keyword,"<b class='orange'>".$keyword."</b>",$persona->nombre) !!}
									</h3>
									<br>
									
								</div>	
							</a>
						</div>
						
					@endforeach
				</div>


				<h2 class="font-light top">
					<em>Casos:</em>
				</h2>
				<div class="row">
					@if($casos->count() == 0 )
						<h2 class="font-light">
							<em>No encontramos ningún resultado de personas con la búsqueda "{{ $keyword }}" </em>
						</h2>
					@endif
					@foreach ($casos as $caso)

						<a href="/casos/ver/{{$caso->id}}">
						<div class="col-md-12 col-xs-12 ">
							<div class="col-md-12   col-xs-12 top ">
				    			<div class="col-xs-12 bg-light-gray post-carousel">

				    				<socialbuttons caso="{{$caso}}" deudor={{$caso->deudor->id}}></socialbuttons>

					    			<div class="col-md-2">
					    				<br>
					    				<img class="thumb-caso img-circle" src="{{$caso->deudor->logo}}"  alt="">
					    			</div>
					    			<div class="col-md-10 text-left black">
					    				<br>
					    				<b>{{ $caso->created_at }} </b> | $ {{$caso->adeudo}} | <b> {{ $caso->usuario->name }}</b> publicó <br>
					    				<em class="orange">"{!! str_replace($keyword,"<b class='orange'>".$keyword."</b>",$caso->titulo) !!}"</em> <br>
					    				{!! str_replace($keyword,"<b class='orange'>".$keyword."</b>",substr($caso->descripcion,0,100)) !!}
					    				
					    				<span class="orange">[...]</span>
										<br> 
					    			</div>
				    			</div>
							</div>
						
						</div>
						</a>			
						
					@endforeach
					<div class="col-xs-12 col-md-10 text-center">
						{{ $casos->links() }}
					</div>
				</div>


			</div>

			<div class="col-md-3 bot">
				
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
	<script src="/js/animations.js"></script>

@endsection


@section('footer')
	@parent
@endsection



