


<template>

	<div class="modal modal-fullscreen fade" id="modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-body col-md-12 col-xs-12">

					<button type="button" class="btn-close-modal-search" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>

					<div class="inner-addon left-addon">
						
						
						
						<br class="visible-xs">
						<br class="visible-xs">
						<br class="visible-xs">
							
						<h2 class=" text-center visible-xs">
							Buscar empresa o persona
						</h2>

					    <i class="fa fa-search icon-search hidden-xs"></i>
					    <input 
							id="inputSearch"
				    		v-on:keyup.enter="search()" 
				    		v-model="toSearch" 
				    		type="text" 
				    		class="form-control  input-search" 
				    		placeholder="Buscar empresa o persona..."
			    		/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

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

<style>
	/* .modal-fullscreen */

	.modal-fullscreen {
	  background: transparent;
	}
	.modal-fullscreen .modal-content {
	  background: transparent;
	  border: 0;
	  -webkit-box-shadow: none;
	  box-shadow: none;
	}
	.modal-backdrop.modal-backdrop-fullscreen {
	  background: #ffffff;
	}
	.modal-backdrop.modal-backdrop-fullscreen.in {
	  opacity: .97;
	  filter: alpha(opacity=97);
	}


	/* .modal-fullscreen size: we use Bootstrap media query breakpoints */

	.modal-fullscreen .modal-dialog {
	  margin: 0;
	  margin-right: auto;
	  margin-left: auto;
	  width: 100%;
	}
	@media (min-width: 768px) {
	  .modal-fullscreen .modal-dialog {
	    width: 750px;
	  }
	}
	@media (min-width: 992px) {
	  .modal-fullscreen .modal-dialog {
	    width: 970px;
	  }
	}
	@media (min-width: 1200px) {
	  .modal-fullscreen .modal-dialog {
	     width: 1170px;
	  }
	}
	.input-search
	{
		background-color: transparent;
		border-color: transparent;
		color: black;
		font-size: 40px ;
		line-height: 80px ;
		height: 60px;
		box-shadow: none;
	}
	.input-search:focus
	{
		border-color: transparent !important;
		box-shadow: none;
	}
	@media (max-width: 767px) {
	  .input-search
		{
			background-color: transparent;
			border-color: transparent;
			color: black;
			font-size: 40px ;
			line-height: 80px ;
			height: 60px;
			box-shadow: none;
		}
		.input-search:focus
		{
			border-color: transparent !important;
			box-shadow: none;
		}
		.input-search::-webkit-input-placeholder {
		   color: transparent;
		}

		.input-search:-moz-placeholder { /* Firefox 18- */
		   color: transparent;  
		}

		.input-search::-moz-placeholder {  /* Firefox 19+ */
		   color: transparent;  
		}

		.input-search:-ms-input-placeholder {  
		   color: transparent;  
		}
	}
</style>