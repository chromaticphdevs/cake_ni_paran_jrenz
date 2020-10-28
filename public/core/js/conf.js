const URL = 'http://cakes.ordering/';

const DS  = '/';
const get_url = function(called_url = null){

	if(called_url != null) {

		return URL+DS+called_url;
	}

	else{
		return URL;
	}
	
}


