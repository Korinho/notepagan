<template>
	<!-- Modal -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

			

				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 col-md-offset-1">
							<img src="/img/login/pato-login.png" class="img-login">
						</div>
						<div class="col-md-6 top text-center">
							<img class="img-center" src="/img/logos/logo-completo.jpg" alt="">
							<br>
							<span class="font-header-login ">Únete a notepagan.com para descubrir que empresas o personas se están haciendo pato</span>
							<br>
							<a href="/auth/facebook" class="btn btn-facebook top"><i class="fa fa-facebook"></i> Continuar con facebook</a>
							<br>
							<span class="font-header-login ">
							<br>
								Al crear una cuenta, aceptas los 
								<a target="_blank" href="/TerminosYCondiciones"><b>términos, condiciones</b> <br>
								y<b> privacidad</b></a> de <a href="/"><b>notepagan.com</b></a>
							</span>

						</div>
					</div>
					
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	
	<div class="modal fade" id="loginModalXS"tabindex="-1" role="dialog">
		<div class="modal-dialog modal-transparent" role="document">
			<div id="login-xs" class="modal-content bg-transparent">
				
				<div class="modal-body">
					<button type="button" class="btn-close-modal" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<img src="/img/login/pato-login.png" class="img-login bot">
					<div class="col-xs-10 col-xs-offset-1">
						<img class="img-center img-100" src="/img/logos/logo-completo-blanco.png" alt="">
					</div>
					<p class=" text-center white">
						<span >Únete a notepagan.com para descubrir que empresas o personas se están haciendo pato</span>
					</p>
					<a href="/auth/facebook" class="btn btn-facebook "><i class="fa fa-facebook"></i> Continuar con facebook</a>
					<div class="col-xs-12 text-center">
						<span class="font-header-login ">
						<br>
							Al crear una cuenta, aceptas los 
							<a target="_blank" href="/TerminosYCondiciones"><b>términos, condiciones</b> <br>
							y<b> privacidad</b></a> de <a href="/"><b>notepagan.com</b></a>
						</span>
					</div>
				</div>
				<div class="modal-footer no-border">
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</template>

<script>

	export default {
		props: ['type'],

		data(){
			return { show: true };
		},
		methods: 
		{
			showlogin: function()
			{
				$('#myModal2').modal('show');
			}
		},
		computed: {
			alertClasses: function() {
				var type = this.type;

				return{
					'Alert' : true,
					'Alert--Success': type == "success",
					'Alert--Error': type == "error"
				}
			}
		}
	};

</script>



