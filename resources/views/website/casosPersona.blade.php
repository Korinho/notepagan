@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')

	<div class="container-fluid">
		<div class="row bot big-top">
			<div class="col-md-8 col-md-offset-1">
				
				<h1 class="font-light">Casos de: {{$persona}}</h1>
				@foreach($personas as $persona)
					@foreach($persona->casos as $caso)
						

						<a href="/casos/ver/{{$caso->id}}">
						
							<div class="col-md-11  bg-light-gray post-carousel top">
				    			
				    			<socialbuttons caso="{{$caso}}" deudor={{$persona->id}}></socialbuttons>
					    			
				    			<div class="col-md-2">
				    				<br>
				    				<img class="thumb-caso img-circle" src="{{$persona->logo}}"  alt="">
				    			</div>
				    			<div class="col-md-10 text-left black">
				    				<br>
				    				<b>{{ $caso->created_at }} </b> | $ {{$caso->adeudo}} | <b> {{ $caso->usuario->nombre }}</b> publicó <br>
				    				<em class="orange">"{{ $caso->titulo }}"</em> <br>
				    				{{ mb_strimwidth($caso->descripcion,0,100) }}[...]
									<br> 
				    			</div>

							</div>
						
						</a>
								
					@endforeach
				@endforeach

			</div>

			
		</div>
	</div>


@endsection

@section('footer')
	@parent
@endsection


@section('scripts')
	<script>
		$(document).ready(function()
		{
			$(window).resize(function()
			{
				var width = $(".img-logo").width();
				$(".img-logo").height(width);	
			});

			var width = $(".img-logo").width();
			$(".img-logo").height(width);
		});
	</script>
	<script src="/js/socialButtons.js"></script>
@endsection


