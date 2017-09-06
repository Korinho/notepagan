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

		<div class="row big-top">
			<div class="col-md-10">
				
					<div class="row" id="app">

						<div class="col-md-4">
							<form action="">
								<img src="{{ "/".$deudor->logo }}" class="img-responsive img-logo" alt="">a
								<input name="logo" type="file">
							</form>
						</div>
						<div class="col-md-8 bot">
							<form  v-on:submit.prevent="submitForm" class="bot">
								
								{{ csrf_field() }}

								<script>
		    					window.Laravel = <?php echo json_encode([
		        					'csrfToken' => csrf_token(),
		    					]); ?>
								</script>

								<h1 class="text-left font-light">Comparte tu caso</h1>
								<div id="files">
							        
							    </div>
								
								<div class="form-group top col-xs-12">
									<span v-if="validName == 'invalid' " class="invalid-message">* Este campo es requerido</span>
							    	<input v-model:="nombre" 
							    		type="text" 
							    		name="field1" 
							    		value="{{ $deudor->nombre }}"
							    		placeholder="Nombre de la empresa o personas"
							    		class=" @{{ validName }}" />
						    		

						    		<select 
					    				name="" 
					    				v-model:="tipo"
					    				class="form-control top bot"
				    				>
						    			<option selected value="{{ $deudor->tipo }} ">{{ $deudor->tipo }}</option>
						    			<option value="personas">Persona</option>
						    		</select>

						    		<span v-if="validProject == 'invalid' " class="invalid-message">* Este campo es requerido</span>
							    	<input v-model:="project"
							    		type="text" 
							    		name="field2" 
							    		value="{{ $caso->titulo }}"
							    		placeholder="Proyecto / Trabajo"
							    		class="@{{ validProject }}" 
						    		/>
							    </div>

							    <div class="form-group col-md-4 col-md-offset-8">
							    	<span v-if="validAdept == 'invalid' " class="invalid-message">* Este campo es requerido y tiene que ser numerico</span>
							    	<input v-model:="adept"
							    		type="text" 
							    		name="field2" 
							    		value="{{ $caso->adeudo }}"
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
						    		>{{ $caso->descripcion }}</textarea>
							    </div>
							    
						    </form>
					    </div>
						<div class="col-md-6 col-md-offset-5 bot">
							
							<div class="row">
								@foreach ($caso->archivos as $archivo)
									<div class="col-md-6">
										<a class="btn btn-file btn-100" href="{{ "/".$archivo->url }}" download="{{ $archivo->nombre }}">
											<div class=" text-center"><span>
												{{ $archivo->nombre }}
											</span></div>
											<img src="/img/icons/remove.png" class="img-remove" />
										</a>
									</div>
									
								@endforeach
							</div>
						</div>
					    {{-- <div class="col-md-6 col-md-offset-5 bot">
					    	<form 	action="/archivos/uploadfile" 
					    			class="dropzone"
					    			id="dropzoneComprobantes"
					    			method="POST" 
					    	>
					    		<div class="dz-default dz-message">
					    			<div class="btn btn-upload">
					    				<i class="fa fa-upload"></i> Sube las evidencias sobre tu caso
				    				</div>
				    			</div>
				    			<div id="preview-template" style="display: none">
									<div class="dz-details top">
										<div class="btn btn-file col-md-3 ">
											<div class="dz-filename m-left m-right"><span data-dz-name></span></div>
											<img src="/img/icons/remove.png" class="img-remove" data-dz-remove />
										</div>
									</div>
									<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
									<div class="dz-success-mark"><span>✔</span></div>
									<div class="dz-error-mark"><span>✘</span></div>
									<div class="dz-error-message"><span data-dz-errormessage></span></div>
				    			</div>

					    		{{ csrf_field() }}

					    	</form>
					    </div> --}}
		
						{{-- <div class="col-md-8 col-md-offset-4 bot">
							<div class="col-md-12">
								<div class="checkbox text-center">
								    <label><input type="checkbox" v-model:="terminos" value="" class="text-center">
								    	Al publicar tu caso aceptas las 
								    	<b><a target="_blank" href="">políticas de privacidad</a></b>
								    	y los
								    	<b><a target="_blank" href="">terminos y condiciones</a></b>
								    	de la empresa
							    	</label>
								</div>
							</div>
					    	<div class="col-md-4 col-md-offset-4 text-center">
					    		<span class="invalid-message bot ">@{{ error_back }} <br></span>
					    		<button v-on:click="submitForm()" class="btn btn-publish"><img src="/img/icons/publish.png" class="img-publish pull-left" alt="">Publicar</button>

					    		
					    	</div>
				    	</div> --}}
					    

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
	{{-- <script src="/js/casos/nuevo.js"></script> --}}

@endsection
