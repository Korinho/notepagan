
app = new Vue({
    el: '#ver',
    
    props: ['comments','usuario','idcaso'],

    data: 
    {
    	documents: false,
    	comment: '',
    	like: false
    },
    created(){
    	

		this.comments = JSON.parse(this.comments);
		console.log(this.comments);
	},

	ready()
	{
		console.log(this.comments.likes);
	},

	methods:{

		setComment: function()
		{	
			if(this.comment != '')
			{
				this.$http.post('/comentario/nuevo',
				{ 
					user_id:			this.usuario,
					caso_id: 			this.idcaso,
					comentario: 		this.comment

				} ).then((response) => {
					var idComment = response.data;
					this.$http.get('/comentarios/'+this.idcaso).then((response) => {
						this.comments = JSON.parse(response.data);
					});	
					this.comment = "";

				}, (response) => {
					
				});	
			}
		},
		hasLike: function(likes)
		{
			for (var i = likes.length - 1; i >= 0; i--) {
				if(likes[i].user_id == this.usuario)
					return true;
			}
			return false;
		},
		setLike: function(id)
		{
			

			this.$http.post('/like/nuevo',
			{ 
				user_id: 			this.usuario,
				comentario_id: 		id,

			} ).then((response) => {
				this.$http.get('/comentarios/'+this.idcaso).then((response) => {
					this.comments = JSON.parse(response.data);
				});	
			}, (response) => {
				
			});	
		},
		setUnlike: function(id)
		{
			

			this.$http.post('/like/destroy/'+id).then((response) => {
				this.$http.get('/comentarios/'+this.idcaso).then((response) => {
					this.comments = JSON.parse(response.data);
				});	
			}, (response) => {
				
			});	
		}

	}

});