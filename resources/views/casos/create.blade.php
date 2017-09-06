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
		<div class="row ">
			<div class="col-md-9 big-top">
					
					<div class="row" id="app">
						
						<div v-for="caso in casos">
							@{{ caso.name }} <br>
						</div>
						<div class="col-md-4 col-xs-12 big-top">
							

							<form 	 
								action="/deudor/logo"
				    			class="dropzone"
				    			id="dropzoneLogo"
					    	>

					    		@if (isset($empresa))
					    			<img src="{{$empresa->logo}}" class="img-responsive img-logo" alt="" id="first-box">
					    			<div class="dz-default dz-message hidden" >
				    				</div>
				    				<input type="hidden" id="inputLogo" value="{{$empresa->logo}}">
				    			@else
				    				<input type="hidden" id="inputLogo">
						    		<div class="dz-default dz-message" >
						    			<img src="/img/icons/camara.png" class="img-responsive img-logo" alt="" id="first-box">
						    			<h3 class="font-light text-center pointer">Subir logo / foto <br class="visible-xs"></h3>
					    			</div>
				    			@endif

				    			<div id="preview-template-logo" style="display: none;">
				    				<div class="dz-default">
										<div class="dz-details top">
											<div class="col-md-6 col-md-offset-3">
												<img data-dz-thumbnail class="preview-logo" />
											</div>
										</div>
									</div>


				    			</div>

					    		{{ csrf_field() }}

					    	</form>
						</div>
						<div class="col-md-8 col-xs-12 bot big-top">
							<form  v-on:submit.prevent="submitForm" class="bot">
								
								{{ csrf_field() }}

								<script>
		    					window.Laravel = <?php echo json_encode([
		        					'csrfToken' => csrf_token(),
		    					]); ?>
								</script>

								<h1 class="text-left center-xs font-light">Comparte tu caso</h1>

								<div id="files">
							        
							    </div>
								<div class="form-group top col-xs-12" id="test">
									<span v-if="validName == 'invalid' " class="invalid-message">* Este campo es requerido</span>
							    	<input 
							    		id="deudor"
							    		type="text" 
							    		name="" 
							    		v-model="nombre"
							    		
							    		placeholder="Nombre de la empresa o personas"
							    		class=" @{{ validName }} typeahead" 
							    		@if (isset($empresa))
							    			value="{{$empresa->nombre}}" 
							    			disabled="true" 
							    		@endif
						    		/>
						    		
						    		<datalist id="autocomplete">
										<option 
										  	v-for="item in nombreTypehead" 
										  	value="@{{ item.nombre }}"
									  	>
									</datalist>

						    		<select 
					    				name="" 
					    				v-model:="tipo"
					    				class="form-control top bot"
				    				>
						    			
					    				@if (!isset($empresa))
					    					<option selected value="empresas">Empresa</option>
						    				<option value="personas">Persona</option>
					    				@else
					    					<option selected value="{{$empresa->tipo}}">{{$empresa->tipo}}</option>
					    				@endif
						    		</select>

						    		<span v-if="validProject == 'invalid' " class="invalid-message">* Este campo es requerido</span>
							    	<input v-model:="project"
							    		type="text" 
							    		placeholder="Proyecto / Trabajo"
							    		class="@{{ validProject }}" 
						    		/>
							    </div>
							    

								<div class="col-md-1 col-md-offset-7 col-xs-1 ">
									<label for="" class="pull-right"><br>MXN</label>
								</div>
							    <div class="form-group col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2">
							    	<span v-if="validAdept == 'invalid' " class="invalid-message">* Este campo es requerido y tiene que ser numerico</span>
							    	
							    	<input v-model:="adept"
							    		type="tel" 
							    		id="adeudo" 
							    		placeholder="No pago: $0.00"
							    		class="@{{validAdept}}" 
						    		/>
							    </div>
							    <div class="form-group col-xs-12">
							    	<span v-if="validDescription == 'invalid' " class="invalid-message">* Este campo es requerido</span>	
							    	<textarea v-model:="description"
							    		placeholder="Descripción del caso" 
							    		onkeyup="adjust_textarea(this)"
										class="@{{validDescription}}" 
						    		></textarea>
							    </div>
							    
						    </form>
					    </div>

					    <div class="col-md-6 col-md-offset-5 col-xs-12 bot">
					    	<form 	action="/archivos/uploadfile" 
					    			class="dropzone"
					    			id="dropzoneComprobantes"
					    			method="POST" 
					    	>
					    		<div class="dz-default dz-message">
					    			<div class="btn btn-upload btn-100">
					    				<i class="fa fa-upload"></i> Sube las evidencias sobre tu caso
				    				</div>
				    			</div>
				    			<div id="preview-template" style="display: none">
									<div class="dz-details top">
										<div class="col-md-6 col-xs-12">
											<div class="btn btn-file btn-100">
												<div class="dz-filename m-left m-right">
													<span data-dz-name></span>
												</div> 
												<img src="/img/icons/remove.png" class="img-remove" data-dz-remove />
											</div>
										</div>
									</div>
									<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
									<div class="dz-success-mark"><span>✔</span></div>
									<div class="dz-error-mark"><span>✘</span></div>
									<div class="dz-error-message"><span data-dz-errormessage></span></div>
				    			</div>

					    		{{ csrf_field() }}

					    	</form>
					    </div>
		
						<div class="col-md-8 col-md-offset-4 col-xs-12 bot">
							<div class="text-center">
								<span v-if="validTerminos == 'invalid' " class="invalid-message">* Debes aceptar los términos, condiciones y privacidad</span>	
							</div>
							<div class="col-md-12">
								<div class="checkbox text-center">

								    <label><input type="checkbox" v-model:="terminos" value="" class="text-center">
								    	Al publicar tu caso aceptas los 
								    	<b><a target="_blank" href="/TerminosYCondiciones">terminos, condisiones</a></b>
								    	y 
								    	<b><a target="_blank" href="/TerminosYCondiciones">privacidad</a></b>
								    	de la empresa
							    	</label>
								</div>
							</div>
					    	<div class="col-md-4 col-md-offset-4 text-center">
					    		<span class="invalid-message bot " v-show="error_back != ''">@{{ error_back }} <br></span><br>
					    		<button v-on:click="submitForm()" class="btn btn-publish btn-100"><img src="/img/icons/publish.png" class="img-publish pull-left" alt="">Publicar</button>

					    		<img src="/img/gifts/loading.gif" v-show="showGift" class="top" alt="">
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

	<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
	<script src="https://cdn.jsdelivr.net/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

	<script src="/js/dropzone.js"></script>
	<script src="/js/typehead.js"></script>
	<script src="/js/casos/nuevo.js"></script>	
	<script src="/js/maskMonkey.js"></script>

	<script>

	    $(function() {
	    	

	        $("#adeudo").maskMoney(
	    	{
	    		prefix: '$  ',
	    		// suffix: '  MXN',
	    		precision: 0
	    	});
	    	
	    });
	</script>


@endsection


