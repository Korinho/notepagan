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
							<b>Top empresas</b> <br>
							que no te pagan
						</h1>
					</div>
					<div class="col-md-8" style="margin-top: 100px;">
						
						@foreach($empresas as $empresa)
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									@if($loop->index <= 2)
										{{-- <img src="/img/icons/pato-{{$loop->index+1}}.png" class="img-top-5" alt=""> --}}
										<img src="{{$empresa->logo}}" class="img-top-5 img-circl" alt="">
									@else
										<img src="{{$empresa->logo}}" class="img-top-5 img-circl" alt="">
									@endif
									<div class="top-5-item   col-md-7 mini-top">
										<b>{{ $loop->index + 1 .".".$empresa->nombre }} </b>
										<br>
										Se ha hecho pato con: 
									</div>
									<div style="margin-top:20px;" class="col-md-3 top-5-item-2 text-center mini-top">
										<b>{{ "$".number_format($empresa->total_deudas) }}</b>
									</div>
									<div style="margin-top:20px;" class="col-md-2 top-5-item-3  mini-top">
										<a href="/empresa/{{$empresa->nombre}}/casos">
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
							<b>Top empresas</b> <br>
							que no te pagan
						</h1>
					</div>
					<div class="col-xs-12">
						
						@foreach($empresas as $empresa)
							<div class="row">
								<div class="col-xs-12 mini-top">
									@if($loop->index <= 2)
										{{-- <img src="/img/icons/gema-{{$loop->index+1}}.png" class="img-top-5" alt=""> --}}
										<img src="{{$empresa->logo}}" class="img-top-5 img-circl" alt="">
									@else
										<img src="{{$empresa->logo}}" class="img-top-5 img-circl" alt="">
									@endif
									<div class="top-5-item   col-md-7 mini-top text-center">
										<b>{{ $loop->index + 1 .".".$empresa->nombre }} </b>
										<br>
										Se ha hecho pato con: 
									</div>
									<div class="col-xs-12  text-center ">
										<h4>{{ "$".number_format($empresa->total_deudas) }}</h4>
									</div>
									<div class="col-xs-8 col-xs-offset-2 text-center">
										<a  class="btn-upload btn-100 col-xs-12" href="/empresa/{{$empresa->nombre}}/casos">
											
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
		
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2 big-top">

				<h1 class="font-light text-center">
					Infórmate
				</h1>
				<h3 class="font-light text-center">
					Todos los casos
				</h3>

				<div class="scroll ">
					
					<ol>
					    @foreach($casos as $caso)
				    		<li style="height: 180px;">
				        		<a href="/casos/ver/{{$caso->id}}">
				        		
				        			<div class="col-md-12  bg-light-white post-carousel top">
				            			
				        				<a href="/casos/ver/{{$caso->id}}"><img src="/img/icons/ver-gris.png" 		
				        						class="ver-button img-circle" 
				        						alt=""
				        				></a>
				        				<a href="/casos/nuevo/{{$caso->deudor->id}}"><img src="/img/icons/escribir.png" 	
				        						class="escribir-button img-circle" 
				        						alt=""
				        				></a>

				            			<div class="col-md-2">
				            				<br>
				            				<img class="thumb-caso img-circle img-center" src="{{$caso->deudor->logo}}"  alt="">
				            				<br>
				            				<p class="text-left ">por {{ $caso->usuario->name}} </p>
				            				<hr class="gray-separator">
				            				<p class="text-left">
				            				Estado: <br>
											<span class="orange">{{ ($caso->status == 1) ? 'Resuelto' : 'Sin resolver' }}</span>
				            				</p>
				            				
				            			</div>
				            			<div class="col-md-10 text-left black">
				            				<br>
				            				<h2>{{ $caso->titulo }}</h2>
				            				<b>{{ $caso->created_at }} </b> | $ {{$caso->adeudo}} | <b> {{ $caso->usuario->nombre }}</b> 
											<br><br>
				            				{{ mb_strimwidth($caso->descripcion,0,200) }}[...]
				        					<br> 
				            			</div>

				        			</div>
				        		
				        		</a>
				        	</li>
					    @endforeach
					</ol>

					<div class="hidden">
						{{$casos->links()}}
					</div>
				
				</div>
			</div>
		</div>

		<div class="bot"></div>

		
	</div>


	
@endsection

@section('scripts')
	<script src="/js/socialButtons.js"></script>
	<script src="/js/jscroll.min.js"></script>
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

			$('.scroll').jscroll({
		        autoTrigger: true,
		        nextSelector: '.pagination li.active + li a', 
		        contentSelector: 'div.scroll',
		        callback: function() {
		            $('ul.pagination:visible:first').hide();
		        }
		    });
		});
	</script>

{{-- 	<script src="/js/animations.js"></script> --}}

@endsection


@section('footer')
	@parent
@endsection



