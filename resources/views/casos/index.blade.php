@extends('layout.website')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('content')
	
	<div class="container-fluid">

		<div id="app" class="row big-top">
			
			@if(Session::has('success'))
				
				<div class="col-md-6 col-md-offset-2">
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close white-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  {{ Session::get('success') }}
					</div>
				</div>
				
			@endif
			


			<div class="col-xs-12">
				<br class="visible-xs">
				<br class="visible-xs">
				@if ($casos->count()==0)
					<div class="col-md-8 col-md-offset-2 col-xs-10">
						<h1 class="text-center font-light">
							No tenemos registrado ningún caso tuyo. <br><br>Puedes agregar un caso nuevo haciendo click al botón de COMPARTIR CASO situado en el menú superior, o en el menu de tu perfil, en la opción !Comparte tu caso¡ 
						</h1>
					</div>
				@else
					<div class="col-md-10 col-md-offset-1 col-xs-10">

						<h1 class="font-light"><em>Estos son tus casos:</em></h1>
					</div>
					<casos list="{{ collect($casos->items()) }}" usuario="{{ Auth::user() }}"></casos>
				@endif
				
			</div>
			<div class="col-xs-12 col-md-10 text-center">
				{{ $casos->links() }}
			</div>
		
		<div id="modalResuelto" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content no-b-radius">
					<div class="modal-body ">
						<div class="row">
							<div class="col-xs-12">
								<button type="button" class="close black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle-o"></i></button>
								<h2 class="font-light text-center">¡Nos alegra que tu caso se haya resuelto!</h2>
							</div>
							<div class="col-md-10 col-md-offset-1 col-xs-12">


								<form 	 
										action="/deudor/logo"
						    			class="dropzone"
						    			id="dropzoneComprobantes"
							    	>

							    	{{ csrf_field() }}
									<div class="form-group">
										<h4 class="font-light"><br>Platicanos el desenlace</h4>
										<textarea 
											v-model="desenlace" 
											cols="30" 
											rows="5" 
											class="form-control " 
											style="resize: none"
										></textarea>
										
										<br>
									</div>
									<div class="col-md-12">
										<div id="template-upload" class="dz-preview dz-file-preview top" style="display: none;">
													  
											<div class="dz-details">
												<div class="col-md-6">
													<div class="btn btn-file btn-100">
														<div class="dz-filename m-left m-right"><span data-dz-name></span></div>
														<img src="/img/icons/remove.png" class="img-remove" data-dz-remove />
													</div>
												</div>
											</div>
											<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
											<div class="dz-success-mark"><span>✔</span></div>
											<div class="dz-error-mark"><span>✘</span></div>
											<div class="dz-error-message"><span data-dz-errormessage></span></div>
											
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-10 col-md-offset-1">
											<input type="hidden" id="caso">

											<div class="row">
												<div class="col-md-6 bot">
										    		<div class="dz-default dz-message">
										    			<div class="btn btn-publish btn-100">
										    				<img src="/img/icons/upload.png" class="img-fixed-left" alt="">
										    				Subir documentos <br>
									    				</div>
									    			</div>
								    			</div>
								    			<div class="col-md-6">
								    				<div 
								    					class="btn btn-upload btn-100"
								    					@click="setResuelto(1)"
							    					>
							    						<img src="/img/icons/ok.png" class="img-fixed-left" alt="">
								    					Concluir caso
								    				</div>
								    			</div>
							    			</div>
							    			<div class="text-center  hidden bot" id="limitFiles" >
								    			<span class="invalid-text">
								    				<i class="fa fa-close"></i>
								    				No puedes subir más archivos
							    				</span>
						    				</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		</div>

	</div>

@endsection


@section('footer')
	@parent
@endsection

@section('scripts')
	<script src="/js/dropzone.js"></script>
	<script>
		window.Laravel = <?php echo json_encode([
	        'csrfToken' => csrf_token(),
	    ]); ?>
    </script>
	<script src="js/casos/index.js"></script>
@endsection
