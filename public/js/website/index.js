Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('[name=_token]').getAttribute('value');

app = new Vue({
    el: '#casosFilter',
    props: ['list'],

    data(){
		return { 
			sort: '',
			reverse: 1,
			masDeben: true,
			menosDeben: false,
			recientes: false,
			finalizados: false,
			noResueltos: false
		};
	},
    created()
    {
    	this.list = JSON.parse(this.list);
    },
    methods: {

    	sortBy: function(sortKey,rev,filter){
    		this.setActiveFilter(filter);
    		this.$http.get('/casos/filter/'+sortKey).then((response) => {
				this.list = JSON.parse(response.data);
				this.reverse = rev;
    			this.sort = sortKey;
			});	
    	},
    	resueltos: function(status,filter){
    		this.setActiveFilter(filter);
    		this.$http.get('/casos/status/'+status).then((response) => {
				this.list = JSON.parse(response.data);
			});	
    	},
    	setActiveFilter: function(active){

    		this.masDeben	 = false;
			this.menosDeben	 = false;
			this.recientes	 = false;
			this.finalizados = false;
			this.noResueltos = false;

			if(active == 1)
				this.masDeben	 = true;
			else if(active == 2)
				this.menosDeben	 = true;
			else if(active == 3)
				this.recientes	 = true;
			else if(active == 4)
				this.finalizados = true;
			else if(active == 5)
				this.noResueltos = true;
    	}

    }
});

