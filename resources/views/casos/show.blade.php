@extends('layout.website')

@section('title', 'Page Title')

@section('style')
	<link rel="stylesheet" href="/css/inputs.css">
	
@endsection
	

@section('navbar')
    @parent
@endsection

@section('content')
	
	<div class="container-fluid">

		<div 
			id="ver" 
			comments="{{ $comentarios }}" 
			idcaso="{{ $caso->id }}"
			@if(Auth::user() != null)
				usuario=" {{ Auth::user()->id }} "
			@endif
			class="row big-top"
		>
		
			<div class="col-lg-11 col-md-10 col-sm-10 col-xs-12">
				
					<div class="row" id="app">

						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 big-top">
							<form action="">
								<img src="{{ $deudor->logo }}" class="img-responsive img-logo" alt="">
								<input name="logo" type="file">
								<h5 class="text-center">por <b>{{ $caso->usuario->name }}</b></h5>
								
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12 center-xs">
										<hr>
										Estado:
										<br>
										<span class="orange">
											@if($caso->status == 1)
												Resuelto
											@else
												Sin resolver
											@endif
										</span>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-8 bot col-xs-12 big-top">
								
							<div class="row">
									
									@if($caso->status == 0)
										<div class="col-lg-10 col-md-12 col-xs-12">
											<h1 class="text-left font-light center-xs">
												{{ $deudor->nombre }} no pagó 
												{{ $caso->titulo }} | Desenlace
											</h1>

											<h4 class="text-left font-light center-xs">
												<b>{{ $caso->created_at }}</b> |
												${{  number_format($caso->adeudo) }}
											</h4>
												
												
											<p>
												<br><br>
												{{ $caso->descripcion }}
											</p>
										</div>
									@else
										<div class="col-lg-10 col-md-12 col-xs-12">
											<h1 class="text-left font-light orange center-xs">
												{{ $deudor->nombre }} por fin pagó 
												{{ $caso->titulo }} 
											</h1>

											<h4 class="text-left font-light center-xs">
												<b>{{ $caso->created_at }}</b> |
												<span class="orange">Resuelto</span>
											</h4>
												
												
											<p>
												<br><br>
												{{ $caso->descripcion }}
												<br><br>
												<span class="orange">Desenlace</span>
												<br>
												{{ $caso->desenlace }}
											</p>
										</div>
									@endif
									
									
									<div class="col-md-10 hidden-xs hidden-sm">
										<div class="row">
											
											<button  v-on:click="documents = true"  class="btn btn-upload m-right">
												<img src="/img/icons/documentos.png" alt="">
												Ver documentos
											</button>
											
											@if(Auth::check())
												<a href="/casos/nuevo/{{ $caso->deudor->id }}" class="btn btn-publish m-right">
													<img src="/img/icons/publish.png" alt="" >
													<span class="">
														Publicar caso de esta 
														@if ($caso->deudor->tipo=='empresas')
															empresa
														@else
															persona
														@endif
													</span>
												</a>
											@else

												<a href="#" data-toggle="modal" data-target="#myModal2" class="btn btn-publish m-right hidden-xs">
													<img src="/img/icons/publish.png" alt="" >
													<span class="">
														Publicar caso de esta 
														@if ($caso->deudor->tipo=='empresas')
															empresa
														@else
															persona
														@endif
													</span>
												</a>
											@endif
											<div class="fb-share-button btn btn-share"
												data-href="https://notepagan.com/casos/ver/{{$caso->id}}" 
												data-layout="button" 
												data-size="large" 
												data-mobile-iframe="true"
											>	
												<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnotepagan.com/casos/ver/{{$caso->id}}%2F&amp;src=sdkpreparse">
												<i class="fa fa-facebook share-icon"></i>
												Compartir
												</a>
											</div>

											

										</div>
									</div>
									<div class="col-xs-12 hidden-md hidden-lg">
										<button  v-on:click="documents = true"  class="btn btn-upload m-right btn-100">
											<img src="/img/icons/documentos.png" alt="">
											Ver documentos
										</button>
										
										@if(Auth::check())
											<a href="/casos/nuevo/{{ $caso->deudor->id }}" class="btn btn-publish m-right btn-100 top">
												<img src="/img/icons/publish.png" alt="" >
												<span class="">
													Publicar caso de esta 
													@if ($caso->deudor->tipo=='empresas')
														empresa
													@else
														persona
													@endif
												</span>
											</a>
										@else
											<a href="#" data-toggle="modal" data-target="#loginModalXS" class="btn btn-publish m-right btn-100 top">
												<img src="/img/icons/publish.png" alt="" >
												<span class="">
													Publicar caso de esta 
													@if ($caso->deudor->tipo=='empresas')
														empresa
													@else
														persona
													@endif
												</span>
											</a>
										@endif
										
										<div class="fb-share-button btn btn-share col-xs-12 top"
											data-href="https://notepagan.com/casos/ver/{{$caso->id}}" 
											data-layout="button" 
											data-size="large" 
											data-mobile-iframe="true"
										>	
											<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnotepagan.com/casos/ver/{{$caso->id}}%2F&amp;src=sdkpreparse">
											<i class="fa fa-facebook share-icon"></i>
											Compartir
											</a>
										</div>
									</div>
										
									


									
									
									<div class="col-lg-10 col-md-12 top col-xs-12" v-show="documents">
										<div class="row" >
											@foreach ($caso->archivos as $archivo)
												<div class="">
													<a 
														class="btn btn-file" 
														href="{{ "/".$archivo->url }}" 
														download
													>
														<div class=" text-center">
															<span>
																{{ $archivo->nombre }}
															</span>
														</div>
													</a>
												</div>
												
											@endforeach
										</div>
									</div>

									
								@if($caso->status == 0 && Auth::user() != null )
									{{-- <div class="col-lg-10 col-md-12 col-xs-12 big-top">
										<div class="row">
											<div class="col-md-1 col-xs-3">
												<img class="img-100" src="{{ Auth::user()->avatar }} " alt="">
											</div>
											<div class="col-md-11 col-xs-9">
												{{ csrf_field() }}
												<textarea 
													class="form-control" 
													rows="2" 
													placeholder="Añadir un comentario"
													v-model="comment"
												></textarea>
												<button 
													class="btn btn-comment pull-right"
													v-on:click="setComment()"
												>
													Comentar
												</button>
											</div>
										</div>
									</div> --}}


								@endif
								<div class="fb-comments top col-md-8 col-xs-12" 
									data-href="https://notepagan.com/casos/ver/{{$caso->id}}" 
									data-width="100%" 
									data-numposts="5"
									data-mobile=true>
								</div>

								{{-- <div   class="col-lg-10 col-md-12 col-xs-12 top">
									
										<div class="top"></div>
										<div v-for="comment in comments" class="row">
											<div class="col-md-1 col-xs-3">
												<img class="img-100 " :src="comment.user.avatar" alt="">
											</div>
											<div class="col-md-11 col-xs-9">
												<span class="orange">
													<span class="pull-right">
														<i class="fa fa-thumbs-o-up"></i>
														@{{ comment.likes.length }}
													</span>
													@{{ comment.user.name }}
												</span>
												<br>
												<span class="text-justify">@{{ comment.comentario }}</span><br>
											</div>
											<div class="col-md-11 col-md-offset-1">
												
												
												<span 
													class="orange pointer"
													v-on:click="setUnlike(comment.id)"
													v-if="hasLike(comment.likes)"
												>
													
													<i class="fa fa-thumbs-o-up"></i>
													Ya no me gusta
													<br><br>
												</span>
												<span 
													v-else
													class="orange pointer"
													v-on:click="setLike(comment.id)"
												>
													<i class="fa fa-thumbs-o-up"></i>
													Me gusta 
													<br><br>
												</span>
												
											</div>
										
										</div>

								</div> --}}
							</div>
						    
					    </div>				    

				    </div>
				 
			</div>
		</div>

	</div>


@endsection



@section('footer')
	@parent
@endsection



@section('scripts')

	{{-- <script src="/js/dropzone.js"></script> --}}
	<script>
		window.Laravel = <?php echo json_encode([
	        'csrfToken' => csrf_token(),
	    ]); ?>

	    $(document).ready(function()
	    {
	    	var windowWidth = $(window).width();

	    	$(".fb-comments").attr('data-width',(windowWidth/10)*6);

	    	$(window).resize(function()
	    	{
	    		windowWidth = $(window).width();
	    		$(".fb-comments").attr('data-width',(windowWidth/10)*6);
	    	});
	    });
    </script>
	<script src="/js/casos/ver.js"></script>

@endsection
