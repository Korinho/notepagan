<template>
	<div id="modalInvita" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog " role="document">
			<div class="modal-content no-b-radius">
				<div class="modal-body ">
					<div class="row">
						<div class="col-xs-12">
							<button type="button" class="close black" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle-o"></i></button>
							<h2 class="font-light text-center">¡Invita a un amigo a platicarnos su caso!</h2>
						</div>
						<div class="col-md-10 col-md-offset-1 col-xs-12">
							
							<div class="form-group">

								<input v-model="email"type="email" class="form-control rounded-input top" placeholder="correo">
								<span v-show="!validEmail" class="invalid-input font-light col-xs-12">*Este email ingresado no es válido</span>

								<textarea v-model="msg" cols="30" rows="10" class="form-control top"></textarea>
								<span v-show="!validMessage" class="invalid-input font-light col-xs-12">*Tienes que ingresar un mensaje</span>

								<button v-show="!sending" v-on:click="sendMessage()" class="top bot btn btn-invitar font-light col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">Invitar</button>
								<br>
							</div>
							<div class="col-xs-12">
								<img v-show="sending" class="img-center" src="/img/gifts/loading.gif" alt="">
							</div>
							<div v-show="success" class="col-md-10 col-md-offset-1 col-xs-12 animated" style="opacity: 0" transition="fade">
								<div class="alert alert-success alert-dismissible" role="alert">
							    	<i class="fa fa-ok"></i>
								    Invitación enviada exitosamente
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script>
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
	]); ?>
	</script>

</template>

<style>
	.invalid-input 
	{
		color:   red;
		text-align: center;
		margin-top: 5px;
		margin-bottom: 15px;
	}
	.no-b-radius { border-radius: 0px; }
	#modalInvita .modal-backdrop.in {
    opacity: 0.1;
	}
	.modal {
	  text-align: center;
	}
	.rounded-input { border-radius: 20px; } 
	
	.btn-invitar
	{
		background-color: #F77937;
		border-radius: 20px;
		color: white;
	}
	.btn-invitar:hover
	{
		-webkit-box-shadow: 2px 2px 10px 0px rgba(50, 50, 50, 0.75);
		-moz-box-shadow:    2px 2px 10px 0px rgba(50, 50, 50, 0.75);
		box-shadow:         2px 2px 10px 0px rgba(50, 50, 50, 0.75);
		color: white;
	}
	@media screen and (min-width: 768px) { 
	  .modal:before {
	    display: inline-block;
	    vertical-align: middle;
	    content: " ";
	    height: 100%;
	  }
	}

	.modal-dialog {
	  display: inline-block;
	  text-align: left;
	  vertical-align: middle;
	}
</style>


<script>

	export default {
		data(){
			return { 
				validEmail: true,
				validMessage: true,
				msg: '',
				email: '',
				sending: false,
				success: false,
				error_back: ''
			};
		},
		created(){
	    	
		},
		methods: {

			sendMessage() { 
				if(!this.validateEmail())
					this.validEmail=false;
				else
					this.validEmail=true;
				if(this.msg == '')
					this.validMessage=false;
				else
					this.validMessage=true;
				
				if( this.validMessage && this.validEmail)
				{
					this.sending = true;
					this.$http.post('/mail',
	    			{ 
	    				email: 	this.email,
	    				msg: 	this.msg,
	    			} ).then((response) => {
	    				this.sending = false;
						if(response.data == 'success')
						{
							this.success = true;
							$(".animated").removeClass('fadeOut');
							$(".animated").addClass('fadeIn');
							this.email = '';
							this.msg = '';

							setTimeout(function(){
								$(".animated").removeClass('fadeIn');
								$(".animated").addClass('fadeOut');
								this.success = false;
							}, 3000);
						}
	    			}, (response) => {
	    				this.error_back = 'Se produjo un error inesperado, intenta de nuevo más tarde'
	    			});	
	    		}
			},
			validateEmail() {
			    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			    return re.test(this.email);
			}
		}
	};

</script>



