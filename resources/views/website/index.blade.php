@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
    
@endsection


@section('content')
<style type="text/css">
		body	{
			overflow-x: hidden;
		}
		.vflotante{
			position:fixed;
			left: 99%;
			top:63%;
			width: 505px;
			height: 308px;
			z-index: 1;
			transition: all .4s ease-in;
			-webkit-transition: all .4s ease-in;
			-moz-transition: all .4s ease-in;
			-o-transition: all .4s ease-in;
		}
		.vflotante:hover{
			left: 73%;
		}
		.ntp{
			top:40%;
			right: 77%;
			position: absolute;
			-webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
		}
		.lobo{
			position: absolute;
		}
	</style>
		<div class="vflotante">
			<img class="ntp" src="/img/logos/logo-nolocontrato.png">
			<img class="lobo" src="/img/popup-nolocontrato.png">
		</div>

	<div class="container-fluid">

		<button class="btn btn-scroll hidden-xs">
			<img src="/img/gifts/scrolldown.gif" class="img-responsive" alt="">
		</button>
		<div class="video-container row">
			<iframe allowfullscreen muted
			src="https://www.youtube.com/embed/7Qf-Lj6fPhA?autoplay=0&rel=0">
			</iframe>
		</div>
		<div class="row" style="background-color: #4d4d4d;">							
			<div class="col-xs-12 text-center">
				<h3 style="color: #fff; margin-top: 20px;margin-bottom: 20px;">¿Alguien se hizo pato y no te pago?</h3>
				<a class="btn btn-default btn-lg" href="" style="position: absolute;margin-top: -55px;margin-left: 30%;border-radius: 30px;background-color: #f77937;border-color: #f77937;color: #fff;">comparte tu caso</a>
			</div>
		</div>
		<div class="row " id="main">
			
			<div class="col-xs-12 text-center bg-index ">
				<h1 class="medium-top medium-bot font-header-index">	
					Hay <b>dos tipos</b> de personas y empresas en este mundo, <br>
					las que siempre pagan  y <b>las que nunca pagan.</b>
				</h1>

			</div>
		</div>


		<!-- Carousel de patos -->
		<div class="row ">
		    <div id="carousel-example-generic" class="carousel slide big-top" data-ride="carousel">
			  

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">

			 	<img src="/img/backgrounds/trofeo.png" class="img-trophy hidden-xs" alt="">
				@foreach ($deudores as $deudor)
					

				    <div class="item {{ ($loop->first) ? 'active' : ''  }}">
						@if($loop->first)
				 			<div class="col-md-12 black bot">
				 				<a href="/empresa/{{$deudor->nombre}}/casos">
				 				<h1 class="text-center font-light">
				 					<b>1.</b> El rey de los patos  <br class="visible-xs">
				 					<img class="logo-carousel" src="{{$deudor->logo}}" alt=""> <br class="visible-xs">
				 					<small>Se ha hecho pato con: ${{ number_format($deudor->total_deudas) }}</small>
				 				</h1>
				 				</a>
			 				</div>
		 				@elseif($loop->index == 1)
		 					<div class="col-md-12 black bot">
		 						<a href="/empresa/{{$deudor->nombre}}/casos">
				 				<h1 class="text-center font-light"><b>2.</b> El pato manchado <br class="visible-xs">
									<img class="logo-carousel" src="{{$deudor->logo}}" alt="">	<br class="visible-xs">
				 					<small>Se ha hecho pato con: ${{ number_format($deudor->total_deudas) }}</small>
				 				</h1>
				 				</a>
			 				</div>
		 				@elseif($loop->index == 2)
		 					<div class="col-md-12 black bot">
		 						<a href="/empresa/{{$deudor->nombre}}/casos">
				 				<h1 class="text-center font-light"><b>3.</b> El patito feo  <br class="visible-xs">
		 							<img class="logo-carousel" src="{{$deudor->logo}}" alt="">	<br class="visible-xs">
				 					<small>Se ha hecho pato con: ${{ number_format($deudor->total_deudas) }}</small>
			 					</h1>
			 					</a>
			 				</div>
				 		@endif
						<img  class="img-carousel top hidden-sm" src="img/carousel/pato-{{$loop->index+1}}.png" alt="...">

						<div class="carousel-caption">
						<div class="row hidden-xs" >
							
							@foreach ($deudor->casos as $caso)
								<a href="/casos/ver/{{$caso->id}}">
								<div class="col-md-10 col-md-offset-2 post-carousel top {{ ($loop->index > 0) ? 'hidden-sm' : ''}} ">
									<div class="row">
										<div class="col-md-2">
											<br>
											<img class="thumb-caso img-circle" src="{{ $caso->usuario->avatar }}"  alt="">
										</div>
										<div class="col-md-10 text-left black">
											<br>
											<b>{{$caso->created_at}} </b> | ${{number_format($caso->adeudo)}} | <b> {{ $caso->usuario->name }} </b> publicó <br>
											<em class="orange">{{ $caso->titulo }}</em> <br>
											{{ mb_strimwidth($caso->descripcion,0,50) }} [...]
											<br> 
										</div>
									</div>
								</div>

								</a>

								@if($loop->index == 2) 
									@break
								@endif

							@endforeach

						</div>
						</div>
				    </div>

			    @endforeach
			    

			   
			    
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left img-circle arrow-carousel bg-gray" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right img-circle arrow-carousel bg-gray" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
		
		<div class="row bg-gradient-orange white text-center">
			<div class="col-sm-4 col-xs-12   top bot">
				<h1 class="font-bold">${{ number_format($totalAdeudos) }} </h1>
				<p>pesos no han sido pagados</p>
			</div>
			<div class="col-sm-4 col-xs-12  top bot">
				<h1 class="font-bold">{{ $totalEmpresas }}</h1>
				<p>empresas no te pagan</p>
			</div> 
			<div class="col-sm-4 col-xs-12  top bot">
				<h1 class="font-bold">{{$totalPersonas}}</h1>
				<p>personas se hacen pato y no te pagan</p>
			</div>
		</div>

		<div class="row bg-white gray font-light text-center">
			<div class="col-xs-12 top bot">
				<h1>Infórmate</h1>
				<h2>Todos los casos</h2>
			</div>
		</div>

		<div id="casosFilter" list="{{ $casos }}">
			{{ csrf_field() }}
			<script>
				window.Laravel = <?php echo json_encode([
					'csrfToken' => csrf_token(),
				]); ?>
			</script>
			
			<div class="row bg-orange text-center">
				<div class="col-sm-12 hidden-xs top bot">
					<span class="m-right m-left pointer" v-on:click="sortBy('adeudo', -1 , 1)"> 
						<i v-if="masDeben" class="fa fa-circle mini-m-right "></i>
						<i v-if="!masDeben" class="fa fa-circle-thin mini-m-right "></i>
						<span style="color:#ffffff;">LOS QUE MÁS DEBEN</span>	<br class="visible-xs"> <br class="visible-xs">
					</span>
					<span class="m-right m-left pointer" v-on:click="sortBy('adeudo', 1 , 2)"> 
						<i v-if="menosDeben" class="fa fa-circle mini-m-right "></i>
						<i v-if="!menosDeben" class="fa fa-circle-thin mini-m-right "></i>
						<span style="color:#ffffff;">LOS QUE MENOS DEBEN</span>	<br class="visible-xs"> <br class="visible-xs">
					</span>
					<span class="m-right m-left pointer" v-on:click="sortBy('created_at', -1, 3)"> 
						<i v-if="recientes" class="fa fa-circle mini-m-right "></i>
						<i v-if="!recientes" class="fa fa-circle-thin mini-m-right "></i>
						<span style="color:#ffffff;">LOS MÁS RECIENTES</span>	<br class="visible-xs"> <br class="visible-xs">
					</span>
					<span class="m-right m-left pointer" v-on:click="resueltos(1,4)"> 
						<i v-if="finalizados" class="fa fa-circle mini-m-right "></i>
						<i v-if="!finalizados" class="fa fa-circle-thin mini-m-right "></i>
						<span style="color:#ffffff;">CASOS RESUELTOS</span>	<br class="visible-xs"> <br class="visible-xs">
					</span>
					<span class="m-right m-left pointer" v-on:click="resueltos(0,5)"> 
						<i v-if="noResueltos" class="fa fa-circle mini-m-right "></i>
						<i v-if="!noResueltos" class="fa fa-circle-thin mini-m-right "></i>
						<span style="color:#ffffff;">CASOS SIN RESOLVER</span>	<br class="visible-xs"> <br class="visible-xs">
					</span>
				</div>
			</div>
			<div class="row visible-xs">
				<div class="col-xs-12">
					<div class="row">
					<div class="panel-group" role="tablist"> 
						<div class="panel panel-default"> 
							<div class="panel-heading bg-orange" role="tab" id="collapseListGroupHeading1"> 
								<h4 class="panel-title white text-center"> 
									<a href="#collapseFilter" class="font-light" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseFilter"> 
										FILTRAR
									</a> 
								</h4> 
							</div> 
							<div class="panel-collapse collapse " role="tabpanel" id="collapseFilter" aria-labelledby="collapseListGroupHeading1" aria-expanded="false"> 
								<ul class="list-group black text-left font-light"> 
									<li class="list-group-item" v-on:click="sortBy('adeudo', -1 , 1)"><b>LOS QUE MÁS DEBEN </b></li>
									<li class="list-group-item" v-on:click="sortBy('adeudo', 1 , 2)"><b>LOS QUE MENOS DEBEN	 </b></li> 
									<li class="list-group-item" v-on:click="sortBy('created_at', -1, 3)"><b>LOS MÁS RECIENTES </b></li> 
									<li class="list-group-item" v-on:click="resueltos(1,4)"><b>CASOS RESUELTOS </b></li> 
									<li class="list-group-item" v-on:click="resueltos(0,5)"><b>CASOS SIN RESOLVER </b></li> 
								</ul> 
								
							</div> 
						</div> 
					</div>
					</div>
				</div>
			</div>
			
			
			<div class="row  " >
				<div class="col-md-3"></div>
				<div class="col-md-6 bot">
					

					<div class="col-md-12 top" v-for="caso in list | orderBy sort reverse">
						<a href="/casos/ver/@{{caso.id}}" >
			    			
			    			<div class="col-sm-12 bg-light-gray post-carousel hidden-xs">
				    			<div class="col-md-2">
				    				<br>
				    				<img class="thumb-caso img-circle" :src="caso.deudor.logo"  alt="">
				    			</div>
				    			<div class="col-md-10 text-left black">
				    				<br>
				    				<b> @{{ caso.created_at }} </b> | $ @{{caso.adeudo}} | <b> @{{caso.usuario.name}}</b> publicó <br>
				    				<em class="orange">"@{{caso.titulo}}"</em> <br>
				    				@{{ caso.descripcion.slice(0,100) }} [...]
									<br> 
				    			</div>
			    			</div>
			    			<div class="col-xs-12 bg-light-gray post-carousel visible-xs bot">
				    			<div class="col-xs-8 col-xs-offset-4">
				    				<br>
				    				<img class="thumb-caso img-circle" :src="caso.deudor.logo"  alt="">
				    			</div>
				    			<div class="col-xs-12 text-center black">
				    				<br>
				    				<b> @{{ caso.created_at }} </b> | $ @{{caso.adeudo}} | <b> @{{caso.usuario.name}}</b> publicó <br>
				    				<em class="orange">"@{{caso.titulo}}"</em> <br>
				    				@{{ caso.descripcion.slice(0,100) }} [...]
									<br> 
				    			</div>
			    			</div>

		    			</a>
		    			<br>
					</div>

					

				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

	</div>
	
	


@endsection



@section('footer')
	@parent
@endsection

@section('scripts')
	
	<script src="/js/website/index.js"></script>
	<script>
		$(document).ready(function()
		{
			

			$('.btn-scroll').click(function(){
				$('body').animate({
					scrollTop: $('#main').offset().top
				}, 1500);
			});
			
		});
	</script>

@endsection


