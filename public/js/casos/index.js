

app = new Vue({
    el: 'body',
    data(){
		return { 
			idCaso: 0,
			dropzone: Dropzone.options.myAwesomeDropzone,
			desenlace: ''
		};
	},
    created()
    {
    	console.log(document.getElementById('template-upload').innerHTML);
    	Dropzone.options.dropzoneComprobantes = 
    	{
    		paralellUploads: 5,
    		maxFilesize: 10,
    		maxFiles: 5,
    		acceptedFiles: "image/*,application/pdf,application/docx",
			paramName: "file", // The name that will be used to transfer the file
			autoProcessQueue: false,
			url: '/archivos/uploadfile/',
			previewTemplate: document.getElementById('template-upload').innerHTML,
			maxfilesexceeded: function(file) {
		        $('#limitFiles').removeClass('hidden');
		    },
			init: function() {
		        dropzoneComprobantes = this;		        
		        dropzoneComprobantes.on("complete", function(file) {
		            dropzoneComprobantes.removeFile(file);
		            if(file.status == 'success')
		            	console.log('Se subieron los archivos');
		            console.log(file);
		        });
		    },
    	};
    },
    methods: {

	    setResuelto: function(status ) {


	    	var id = document.getElementById('caso').value;
	    	this.$http.post('/api/status',
			{ 
				id: 	id,
				status: status,
				desenlace: this.desenlace

			} ).then((response) => {
				dropzoneComprobantes.options.url = '/archivos/uploadfile/'+id;
    			dropzoneComprobantes.processQueue();

				this.$http.get('api/miscasos').then((response) => {
					// this.list = JSON.parse(response.data);
					
					this.$http.post('api/messages',
					{
						message: 'Caso concluido correctamente',
						type: 'success'
					}).then((response) => {
						window.location.href = document.URL;
					});	
				});	

			}, (response) => {
				this.error_back = 'Se produjo un error inesperado, intenta de nuevo más tarde'
			});	
	    }
    }
});

