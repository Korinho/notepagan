

app = new Vue({
    el: '#animate',
    props: ['list'],
    data(){
		return { 
			
		};
	},
    created()
    {
    },
    methods: {

	    setStatus: function (status, element) {
	    	if (status == 1)
	    	{
	    		$("#"+element).removeClass('hidden');
	    		$("#"+element).addClass('fadeIn');
	    		$("#"+element).removeClass('fadeOut');
	    	}
	    	else
	    	{
	    		$("#"+element).addClass('fadeOut');
	    		$("#"+element).removeClass('fadeIn');
	    	}
	    }
    }
});

