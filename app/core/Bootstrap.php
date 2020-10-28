<?php

	class Bootstrap{

		private $current_controller = BASECONTROLLER;
		private $current_method = BASEMETHOD;
		private $params = []; //parameters of the request to be passed on the functions

		public function __construct()
		{


			$url = $this->getURL();
			if( $url !== FALSE ) {
				//check for controller
				if(isset($url[0])){
					if(file_exists( CNTLRS.DS.ucfirst($url[0]).'.php' )){

						$this->current_controller = ucfirst($url[0]);
						unset($url[0]);
					}


					require_once(CNTLRS.DS.$this->current_controller.'.php');

					$this->current_controller = new $this->current_controller;
				}

				if(isset($url[1])){

					if (method_exists($this->current_controller, $this->cleanMethod(strtolower($url[1]))))
					{	
						$this->current_method = $this->cleanMethod($url[1]);
						unset($url[1]);
					}
				}

				//check if there is still remaining url parameters
				$this->params = $url ? array_values($url) : [];

				call_user_func_array([$this->current_controller , $this->current_method] , $this->params); 
			}
			//if URL IS NOT SET THEN THE base controller and the base action will be thrown
			else{	
				require_once(CNTLRS.DS.$this->current_controller.'.php');
				
				$this->current_controller = new $this->current_controller;

				$this->current_method = $this->current_method;

				call_user_func_array([$this->current_controller , $this->current_method] , $this->params);
			}
		}

		private function getURL(){

			if(isset($_GET['url'])){

				$url = $_GET['url']; $url = rtrim($url , '/');

	            $url = filter_var($url , FILTER_SANITIZE_URL); 
	            $url = explode('/',$url);

	            return $url;
			}

			else{
				return FALSE;
			}
		}

		private function cleanMethod($method)
		{	
			$method = explode('-' , $method);
			
			$n_method = $method[0];
			
			for($i = 0 ; $i < count($method) ; $i++)
			{
				if($i == 0)
				{
					continue;
				}else
				{
					$n_method .= ucfirst($method[$i]);
				}
			}

			return $n_method;
		}
	}