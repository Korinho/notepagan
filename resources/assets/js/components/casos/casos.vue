<!-- @click="setResuelto(caso.id,1)" -->
<template>
	<div class="col-md-10">
		<div class="row bot " v-for="caso in list">
			<div class="col-md-2 hidden-xs top">
				<img  
					src="/img/icons/resuelto.png" 
					alt="" 
					class="pull-right img-resuelto"
					@click="setId(caso.id)"
					v-if="!caso.status"
					data-toggle="modal" data-target="#modalResuelto"
				>
			</div>
			<a href="/casos/ver/{{caso.id}}">
			<div class="col-md-10 col-xs-12" >
					<div 
						class="col-md-10 col-xs-12 top " 
						@mouseleave="setStatus(false, 'caso-'+caso.id)" 
						@mouseenter="setStatus(true, 'caso-'+caso.id)" 
					>
		    			<div class="col-xs-12 bg-light-gray post-carousel">

		    				<div 
		    					id="caso-{{caso.id}}"
		    					class="col-xs-12 resuelto animated" 
		    					v-if="caso.status"
		    					v-show="!caso.status"
		    					transition="fade"
	    					>
	    					
								<button class="btn-resuelto ">
									<img src="/img/icons/ok.png" class="icon-resuelto" alt="">
									<span class="m-left m-right">Caso resuelto</span>
								</button>
							</div>
			    			
			    			<div class="col-md-2">
			    				<br>
			    				<img class="thumb-caso img-circle" :src="caso.deudor.logo"  alt="">
			    			</div>
			    			<div class="col-md-10 text-left black">
			    				<br>
			    				<b>{{ caso.created_at }} </b> | $ {{caso.adeudo}} | <b> {{ usuario.name }}</b> publicó <br>
			    				<em class="orange">"{{ caso.titulo }}"</em> <br>
			    				{{ caso.descripcion.slice(0,100) }} [...]
								<br> 
			    			</div>
			    			
		    			</div>
		    			<div class="visible-xs bot col-xs-12">
			    			<img  
								src="/img/icons/resuelto.png" 
								alt="" 
								class="img-center bot img-resuelto"
								@click="setId(caso.id)"
								v-if="!caso.status"
								data-toggle="modal" data-target="#modalResuelto"
							>
						</div>

					</div>
			</div>
			</a>
			
		</div>

	</div>

	

</template>


<script>
	export default {
		props: ['list','usuario'],
		data(){
			return { 
				test: false,
				status: [],
				idCaso: 0
			};
		},
		created(){
	    	

			this.list = JSON.parse(this.list)
			this.usuario = JSON.parse(this.usuario)
			

			
			
		},
		methods: {
		    setStatus: function (status, element) {
		    	if (status == 1)
		    	{
		    		$("#"+element).css('display','inline');
		    		$("#"+element).addClass('fadeIn');
		    		$("#"+element).removeClass('fadeOut');
		    	}
		    	else
		    	{
		    		$("#"+element).addClass('fadeOut');
		    		$("#"+element).removeClass('fadeIn');
		    	}
		    },
		    setId: function(id){
		    	document.getElementById('caso').value = id;
		    }
	    }
		
	};


</script>




