@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')

	<div class="container">
		<div class="row">			
		<div class="col-md-9 big-top">
				<h1 class="text-center">Sobre No te Pagan</h1><br><br>
			<p>Notepagan.com es una plataforma para denunciar experiencias negativas, en específico en torno al tema de haber o no recibido remuneración por cierto trabajo. El objetivo del sitio es compartir quejas y denuncias con el fin de que estas se divulguen y sirvan para la toma de decisiones, la creación de consciencia ante este tipo de situaciones y por ende para la mejora continua de empresas, productos, servicios y personas.</p>
			<p>Ni notepagan.com ni su servicio de hosting son responsables por las quejas ni comentarios vertidos por los/las usuarios/as del sitio, estas son de entera responsabilidad de la persona que las emite. </p>
			<p>Es una plataforma en donde los casos publicados son dados de alta por usuarios que aceptan los Términos y Condiciones del sitio.  </p>
			<p>El ranking de los casos más populares se genera de manera automática basado en las calificaciones y entradas que los usuarios emiten hacia estos. </p>
			<p>En caso de tratarse de empresas, el ranking es generado a partir del número total de quejas hacia cada empresa. </p>
			<p>Para retirar casos ya publicados es necesario escribir un correo a casos@notepagan.com argumentando la razón por la cual se debería retirar el caso del sitio. </p>
		</div>
		</div>
		<div class="col-md-3">
			
		</div>
		</div>
	</div>


@endsection

@section('footer')
	@parent
@endsection


@section('scripts')
	
@endsection


