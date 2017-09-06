@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')

	
	<div class="container-fluid bg-404"">
		<div class="row center-content">
			
			<div class="col-xs-12 white font-light">

				<div class="text-center ups"><strong>¡Ups!</strong></div>
				<div class="text-center big-text">
					<b>
						Esta página se está haciendo pato
					</b>
				</div>
				<h2 class="font-light text-center">
					La página que estas buscando no ha sido encontrada o el link está roto
				</h2>
				<br>
				<button class="btn btn-publish text-center center-block font-light">
					<span class="padding-button">
						<a href="{{ URL::previous() }}"><strong>Regresar</strong></a>
					</span>
				</button>

			</div>
		</div>
	</div>


@endsection

@section('footer')
	@parent
@endsection


@section('scripts')
	
@endsection


