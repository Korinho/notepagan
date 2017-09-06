<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-53364R');</script>
	<!-- End Google Tag Manager -->


	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{{ csrf_token() }}">
    
    <meta name="robots" content="all" />
	
	<meta name="description" content="Denuncia gratis a las empresas o personas que te deben dinero. Aquí podrás dejar quejas, reclamos y denuncias por Internet.">

	<meta property="fb:admins" content="10205374178713099"/>

	<title>¿Alguien te debe dinero? ¡Denúncialo ahora mismo en No Te Pagan!</title>
	
 	<link rel="shortcut icon" href="/img/favicon.png">

	<link rel="stylesheet" href="/css/app.css">

	<link rel="stylesheet" href="/css/font-awesome.min.css">
	
	{{-- <link rel="stylesheet" href="/css/style.css"> --}}

	{{-- <link rel="stylesheet" href="/css/fonts.css"> --}}
	
	{{-- <link rel="stylesheet" href="/css/components/loginModal.css"> --}}
	
	{{-- <link rel="stylesheet" href="/css/dropzone.css"> --}}

	{{-- <link rel="stylesheet" href="/css/animate.css"> --}}
	
	@yield('style')

	{{-- Código de AddSence --}}
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-9543340729676796",
	    enable_page_level_ads: true
	  });
	</script>
	{{-- Código de AddSence --}}

</head>
<body>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-53364R"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


	{{-- Código para facebook --}}
	<div id="fb-root"></div>
	
<script>
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
	{{-- Código para facebook --}}
	
	<div id="files">
    </div>

	<div id="statics">
		<loginmodal></loginmodal>
		<modalinvita></modalinvita>
		<modalbusqueda></modalbusqueda>
	</div>
	

	


	@section('navbar')
	
		<nav class="navbar navbar-default fixed-top">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header bg-white">
		    	<div class="row visible-xs">
		    		<div class="col-xs-12">
		    			<div class="dropdown drop-login-m text-center"  >
							
				        	@if(Auth::check())
				        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          		<img src="{{ Auth::user()->avatar }}" class="icon-nav-logged img-circle" alt="">
					          	{{ Auth::user()->name }} 
					          	<img data-toggle="modal" data-target="#modal-fullscreen" src="/img/icons/buscar.png" class="icon-nav" alt="">
					          	<a href="/auth/facebook/logout" class="pull-right"><i class="fa fa-sign-out"></i></a>
					          	</a>

				        	@else

					            <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
				          		<img data-toggle="modal" data-target="#loginModalXS" src="/img/icons/pato.png" class="icon-nav" alt="">
					          	<span data-toggle="modal" data-target="#loginModalXS">INICIAR SESIÓN <span class="caret"></span> </span> 
								
								<img data-toggle="modal" data-target="#modal-fullscreen" src="/img/icons/buscar.png" class="icon-nav" alt="">


					          	</a>

				          	@endif
				        </div>

		    		</div>
		    		<div class="col-xs-12 nav-mobile" >
				    	<a href="/"><img class="logo-movil" src="/img/logos/logo-completo.jpg" alt=""></a>
				      	<button type="button" class="navbar-toggle bg-orange collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				        </button>
			        </div>
		        </div>
		      
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      
		      <ul class="nav navbar-nav ">
		       <a href="/"><li class="img-nav-logo hidden-xs"><img src="/img/logos/logo-completo.jpg" alt=""></li></a>
		      	@if(Auth::check())
		        	<li class="visible-xs"><a href="/miscasos" class="visible-xs" href="#">MIS CASOS</a></li>
		        	<li class="visible-xs"><a data-toggle="modal" data-target="#modalInvita" class="" href="#">INVITA A UN AMIGO</a></li>
	        	@else
	        		<li class="visible-xs"><a data-toggle="modal" data-target="#loginModalXS" href="/casos/nuevo">COMPARTIR CASO</a></li>
		        @endif
		      </ul>
		      
		      <ul class="nav navbar-nav navbar-right">


				{{-- Para desktop y tablet --}}

		        <li><a class="text-left" href="/empresas">EMPRESAS</a></li>
		        <li><a class="text-left" href="/personas">PERSONAS</a></li>
		        @if(Auth::check())
		        	<li><a href="/casos/nuevo">COMPARTIR CASO</a></li>
				@else
					<li class="hidden-xs"><a data-toggle="modal" data-target="#myModal2" href="/casos/nuevo">COMPARTIR CASO</a></li>
		        @endif
		        <li class="dropdown drop-login pull-right hidden-xs"  >
				
		        	@if(Auth::check())
		        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
		          			<img src="{{ Auth::user()->avatar }}" class="icon-nav-logged img-circle" alt="">
			          		{{ Auth::user()->name }} <span class="caret"></span>
			          		<img data-toggle="modal" data-target="#modal-fullscreen" src="/img/icons/buscar.png" class="icon-nav" alt="">
			          	</a>
		        	@else
						
			            <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
		          		<img data-toggle="modal" data-target="#myModal2" src="/img/icons/pato.png" class="icon-nav" alt="">
			          	<span data-toggle="modal" data-target="#myModal2">INICIAR SESIÓN <span class="caret"></span> </span>						
						<img data-toggle="modal" data-target="#modal-fullscreen" src="/img/icons/buscar.png" class="icon-nav" alt="">
			          	</a>

		          	@endif
		          	
					 
		        
				<ul id="drop-logged" class="dropdown-menu" >
					<li><a href="/miscasos" class="text-center" href="#">Mis casos</a></li>
					<hr class="login-separator">
					<li><a class="text-center" href="/casos/nuevo">¡Comparte tu caso!</a></li>
					<hr class="login-separator">
					<li><a data-toggle="modal" data-target="#modalInvita" class="text-center" href="#">Invita a un amigo</a></li>
					<hr class="login-separator">
					<li><a class="text-center" href="#"></a></li>
					<br>
					<hr class="login-separator">
					<li><a class="text-center " href="/auth/facebook/logout">Cerrar sesión</a></li>
				</ul>
				</li>
	        	@if(Auth::check())
		        	<li class="visible-xs"><a class="text-left" href="/auth/facebook/logout">CERRAR SESIÓN</a></li>
		        @endif


		      </ul>
		    </div><!-- /.navbar-collapse -->
		</nav>		
			
	@show
	
	@yield('content')
	
	

	@section('footer')
		
		<footer class="footer ">
			
			<div class="container-fluid bg-footer">
				<div class="row">
					<div class="col-sm-5 top">
						<div class="row">
							<div class="col-md-6 col-xs-10 col-xs-offset-1">
								<img src="/img/footer/logo.png" class="logo-footer img-center  pull-left" alt="">
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-8 col-lg-offset-4">
								<p class="text-center footer-medium">
								<br><br>¿Alguien se hizo pato y no te pago?</p>
								@if(Auth::check())
									<a href="/casos/nuevo"><button class="btn btn-footer">Comparte tu caso</button></a>
								@else
									<button data-toggle="modal" data-target="#myModal2" class="btn btn-footer hidden-xs">Comparte tu caso</button>
									<button data-toggle="modal" data-target="#loginModalXS" class="btn btn-footer visible-xs">Comparte tu caso</button>
								@endif
							</div>
						</div>
					</div>
					<div class="col-sm-2 top-xs">
						<br class="visible-xs">
						<img src="/img/footer/pato.png" class="pato-footer img-center" alt="">
					</div>
					<div class="col-sm-5 col-xs-12 top">
						<div class="row">
							<a target="_blank" href="https://twitter.com/Notepagan"> 
								<img src="/img/footer/twitter.png" class="pull-right m-right icon-footer hidden-xs" alt="">
							</a>
							<a target="_blank" href="https://facebook.com/notepagan"> 
								<img src="/img/footer/facebook.png" class="pull-right m-right icon-footer hidden-xs" alt="">
							</a>
							<a target="_blank" href="https://www.youtube.com/channel/UCRD4IguX5g-CAHT846pnHoA"> 
								<img src="/img/footer/youtube.png" class="pull-right m-right icon-footer hidden-xs" alt="">
							</a>

							
						</div>
						<div class="row">
							<div class="col-lg-8">
								<p class="text-center footer-medium">
								<br><br>¿Al primo de tu amigo le pasó?</p>
								@if(Auth::check())
									<button data-toggle="modal" data-target="#modalInvita" class="btn btn-footer bot">Invítalo</button>
								@else
									<button data-toggle="modal" data-target="#myModal2" class="btn btn-footer bot hidden-xs">Invítalo</button>
									<button data-toggle="modal" data-target="#loginModalXS" class="btn btn-footer bot visible-xs">Invítalo</button>
								@endif
							</div>
						</div>
					</div>
					
				</div>
				
			</div>

			<div class="container-fluid">
				<div class="row text-center">
					<span style="font-size: 14.5px;">Atención: El sitio notepagan.com como su servicio de hosting, no se consideran responsables por las quejas o comentarios que sus usuarios comparten en la plataforma; estos son total responsabilidad del usuario que los emite.</span>
				</div>
			</div>
			<div class="container-fluid sub-footer">
				<div class="hidden-xs">
					<a href="/faqs" class="mini-m-right">Sobre notepagan.com</a>
					<span class="mini-m-right">|</span>
					<a href="/TerminosYCondiciones" class="mini-m-right">Términos y Condiciones</a>		
					<span class="mini-m-right">|</span>
					<a href="/TerminosYCondiciones" class="mini-m-right">Privacidad</a>		
					<span class="mini-m-right">|</span>
					<a href="/publicidad" class="mini-m-right">Publicidad</a>		
					<a href="http://sitiorandom.com/" class="pull-right">Creado por: RANDOM</a>	
				</div>
				<div class="visible-xs">
					<a href="/" class="col-xs-12">Sobre notepagan.com </a>
					<a href="/TerminosYCondiciones" target="_blank" class="col-xs-12">Términos, condiciones y privacidad</a>
				</div>		

			</div>
		</footer>
	@show
<script>
	export default {
		data(){
			return { toSearch: '' };
		},

			methods: 
			{
				search: function()
				{
					location.href = '/casos/buscar/'+this.toSearch;
				}
			}
	};

	$(document).ready(function()
	{	
		$('#modal-fullscreen').on('shown.bs.modal', function () {
		    $('#inputSearch').focus();
		});

		$(".modal-fullscreen").on('show.bs.modal', function () {
			
			setTimeout( function() {
				$(".modal-backdrop").addClass("modal-backdrop-fullscreen");
				$("#inputSearch").focus();
			}, 0);
			
		});

		$(".modal-fullscreen").on('hidden.bs.modal', function () {
		  $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
		});
	})
</script>
	
	
	
	<script src="/js/app.js"></script>
	<script src="/js/layout.js"></script>
	<script src="/js/numericInput.js"></script>

	
	@yield('scripts')
	
	
	
</body>


</html>