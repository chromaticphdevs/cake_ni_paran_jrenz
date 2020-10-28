<?php 	


	function redirect($location){

		header("Location:".URL.DS.$location);
	}

	function get_url($location = null){

		if($location == null) {

			return URL;
		}
		else{
			return URL.DS.$location;
		}
	}

	function print_url($location = null){

		if($location == null) {

			echo URL;
		}
		else{
			echo URL.DS.$location;
		}
	}
?>