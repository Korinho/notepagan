
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('[name=_token]').getAttribute('value');

app = new Vue({
    el: '#app',
    data: {

    	casos: [],

    	query: '',

    	previewLogo: '',
    	nombreTypehead:'',
    	idCaso: 0,
    	idDeudor: 0,

    	validate: 'false',
    	validName: 'valid',
    	validProject: 'valid',
    	validAdept: 'valid',
    	validDescription: 'valid',

    	tipo: '',
    	nombre: '',
    	project: '',
    	adept: '',
    	description: '',
    	terminos: false,

    	showGift: false,
    	error_back: '',
	    message: 'Hello Vue.js!',
	    dropzone: Dropzone.options.myAwesomeDropzone
  	},

    created: function() 
    {
    	this.previewLogo = $("#inputLogo").val();

    	
    	Dropzone.options.dropzoneComprobantes = 
    	{
    		autoDiscover: false,
    		maxFilesize: 20,
			paramName: "file", // The name that will be used to transfer the file
			autoProcessQueue: false,
			url: '/archivos/uploadfile/'+this.idCaso,
			acceptedFiles: "image/*,application/pdf,application/docx",
			previewTemplate: document.getElementById('preview-template').innerHTML,
			renameFilename: function (file) {
				if(file.length >= 25)
				{
					var ext = file.split('.').pop();
					console.log(file);
                	return file.renameFilename = file.slice(1,20)+"___ ."+ext;
            	}
            	return file;
            },
			init: function() {

				dropzoneComprobantes = this;

		        		        
		        dropzoneComprobantes.on("complete", function(file) {
		            dropzoneComprobantes.removeFile(file);
		            if(file.status == 'success')
		            	console.log('Se subieron los archivos');
		            console.log(file);
		        });
		    }

    	};
    	Dropzone.options.dropzoneLogo = 
    	{
    		maxFilesize: 20,
			paramName: "file", // The name that will be used to transfer the file
			autoProcessQueue: false,
			url: '/deudor/'+this.idDeudor+'/setlogo',
			maxFiles:1,
			acceptedFiles: "image/*",
			previewTemplate: document.getElementById('preview-template-logo').innerHTML,
			init: function() {
				this.on("maxfilesexceeded", function(file) {
					this.removeAllFiles();
					this.addFile(file);
				});
				this.on ("addedfile",function(file)
				{
					$("#first-box").css('display','none');
				});
		        dropzoneLogo = this;		        
		        dropzoneLogo.on("complete", function(file) {
		            dropzoneLogo.removeFile(file);
		            if(file.status == 'success')
		            	console.log('Se subió el logo los archivos');
		            console.log(file);
		        });
		    },
    	};
    	// this.dropzone = Dropzone.options.myAwesomeDropzone;

    	// this.dropzone = Dropzone.options.myAwesomeDropzone;

    },

    ready: function(){

    	this.client = algoliasearch('U771ULPBFJ', 'b54e349df377eff4a74fce3a93fede88');

    	this.index = this.client.initIndex('deudors');

    	$("#deudor")
    		.typeahead(null,
			{
				source: this.index.ttAdapter(),
				display: 'nombre',
				templates: 
				{
					suggestion: function(hit)
					{
						return (

								'<div class="">' + 
									'<img class="pato-autocomplete" src="/img/favicon.png" alt="">'+
									'<img class="img-autocomplete" src="'+hit.logo+'" alt="">'+
									'<h3 class="tt-title">' + hit._highlightResult.nombre.value + '</h3>' +
									
								'</div>'

							);
					}
				}
			})
			.on('typeahead:select', function(e, suggestion)
			{
				$(".dz-default img").attr('src',suggestion.logo);
				$(".dz-default h3").css('display','none');
				this.previewLogo = suggestion.logo;
			}.bind(this));
    },

    

	methods: {
	    submitForm: function() {

	        this.validate = 'true';
	        if(
        		   this.validName == '' 
        		&& this.validProject == '' 
        		&& this.validAdept == ''
        		&& this.validDescription ==''  
        		&& this.tipo != ''
        		&& this.terminos

    		)
	        {
	        	
	        	if
        		( $("#dropzoneComprobantes").hasClass('dz-started') && 
    			  ( $("#dropzoneLogo").hasClass('dz-started') || $("#dropzoneLogo .dz-message img").attr('src') != '/img/icons/camara.png' )

        	    )
    			{
	        		// Obtener el valor del adeudo del entero
		        	this.adept = this.adept.split(',').join('');
		    		this.adept = this.adept.replace("$"," ");
		    		// this.adept = this.adept.replace("MXN"," ");
		    		this.adept = this.adept.replace(" ",'');


		    		if(this.adept > 10000000)
		    			this.error_back = 'Hola, no creemos que haya alguien que te deba tanto dinero, revisa la cantidad, en caso de ser correcta, que mala onda bro!'
		    		else
		    		{
			        	this.showGift = true;

		    	    	this.$http.post('/api/deudores/nuevo',
		    			{ 

		    				tipo: 			this.tipo,
		    				nombre: 		this.nombre,
		    				total_deudas: 	parseInt(this.adept),
		    				logo: 			this.previewLogo

		    			} ).then((response) => {
		    				this.idDeudor = response.data;
	    					if(this.previewLogo == '')
	    					{
		    					dropzoneLogo.options.url = '/deudor/'+this.idDeudor+'/setlogo',
			    				dropzoneLogo.processQueue();
			    			}

		    				// Setear el caso corresponediente
		    				this.setCaso()

		    			}, (response) => {
		    				this.error_back = 'Se produjo un error inesperado, intenta de nuevo más tarde'
		    			});	

		    			this.showGift = false; 
		    		}
		    	}
		    	else
		    	{
		    		this.error_back = "\n Debes subir al menos una evidencia y un logo"
		    	}
	        }

			var formData = new FormData();		
	    },
	    processUpload: function(id)
	    {

	    	dropzoneComprobantes.options.url = '/archivos/uploadfile/'+this.idCaso;
	    	dropzoneComprobantes.processQueue();

	    	dropzoneComprobantes.on("complete", function(file) {
			  window.location.href = "/casos/ver/"+id;
			});
	    },
	    setDeudor: function ()
	    {	    	   	
	    },
	    setCaso: function()
	    {
	    	// Insertar el caso en la base de datos
	    	this.$http.post('/casos/nuevo',
	    	{ 
	    		deudor_id: this.idDeudor,
	    		titulo: this.project,
	    		adeudo: parseInt(this.adept),
	    		descripcion: this.description,
	    		terminos: this.terminos

	    	}).then(function(response)  
	    	{

	    		this.idCaso = response.data;
	    		this.showGift = true;
	    		this.processUpload(this.idCaso);

	    		//window.location.href = "/casos/ver/"+this.idCaso;

	    	}.bind(this), function(response)  
	    	{
	    		this.error_back = 'Se produjo un error inesperado, intenta de nuevo más tarde'
	    		idDeudor = response.data;
	    		this.$http.post('/api/deudores/destroy/'+idDeudor,
	    		{ 
	    			tipo: this.tipo,
	    			nombre: this.project,
	    			total_deudas: this.adept,
	    			logo: 'test'

	    		});
	    	});
	    },
	    autocomplete: function()
	    {
	    	
			this.index.search(this.deudor, function(error, results)
			{
				this.casos = results.hits;
				console.log(this.casos);
			}.bind(this));
	    }
	},
	computed:
	{

		validName: function()
		{
			if(this.nombre == '' && this.validate == 'true')
				return ('invalid');
			return ('');
		},
		validProject: function()
		{
			if(this.project == '' && this.validate == 'true')
				return ('invalid');
			return ('');
		},
		validAdept: function()
		{
			if(this.adept == '' && this.validate == 'true')
				return ('invalid');
			return ('');
		},
		validDescription: function()
		{
			if(this.description == '' && this.validate == 'true')
				return ('invalid');
			return ('');
		},
		validTerminos: function()
		{
			if(this.terminos == '' && this.validate == 'true')
				return ('invalid');
			return ('');
		}
	}


});

function adjust_textarea(h) 
{
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}


