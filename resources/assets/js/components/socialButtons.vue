


<template>

	<!-- <a href="#"><img :src="'/img/icons/'+face+'.png'" 	    
			class="facebook-button img-circle" 
			alt=""
			@mouseleave="face='facebook-gris'" 
			@mouseenter="face='facebook'" 
	></a> -->
	<a href="/casos/ver/{{caso.id}}"><img :src="'/img/icons/'+ver+'.png'" 		
			class="ver-button img-circle" 
			alt=""
			@mouseleave="ver='ver-gris'" 
			@mouseenter="ver='ver'" 
	></a>
	<a href="/casos/nuevo/{{deudor}}"><img :src="'/img/icons/'+escribir+'.png'" 	
			class="escribir-button img-circle" 
			alt=""
	></a>

</template>

<script>
	export default {
		props: ['caso','deudor'],
		data(){
			return { 
				toSearch: '',
				face: 'facebook-gris',
				ver: 'ver-gris',
				escribir: 'escribir'
			};
		},

		created(){
			this.caso = JSON.parse(this.caso)
		},
		methods: {
			
		}
	};

</script>

<style>
	.facebook-button
	{
		z-index: 10;
	    position: absolute;
	    right: 100px;
	    top: 10px;
	    width: 35px;
	}
	.ver-button
	{
		z-index: 10;
	    position: absolute;
	    right: 55px;
	    top: 10px;
	    width: 35px;
	}
	.escribir-button
	{
		z-index: 10;
	    position: absolute;
	    right: 10px;
	    top: 10px;
	    width: 35px;
	}
	.escribir-button:hover,
	.ver-button:hover,
	.facebook-button:hover
	{
		-webkit-box-shadow: 3px 3px 10px 0px rgba(0, 0, 0, 0.50);
		-moz-box-shadow:    3px 3px 10px 0px rgba(0, 0, 0, 0.50);
		box-shadow:         3px 3px 10px 0px rgba(0, 0, 0, 0.50);
	}
</style>

