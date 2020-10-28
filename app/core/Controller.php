<?php 	

	abstract class Controller{

		public function model($model)
		{

			$model = ucfirst($model);

			if(file_exists(MODELS.DS.$model.'.php')){

				require_once MODELS.DS.$model.'.php';

				return new $model;
			}
			else{

				die($model . 'MODEL NOT FOUND');
			}
		}


		public function view($view , $data = []) 
		{

			extract($data);
            
            if(file_exists(VIEWS.DS.$view.'.php'))
            {
                require_once VIEWS.DS.$view.'.php';
            }else{
                die('View does not exists');
            }
		}

		public function request()
		{
			if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
				return 'POST';
			return 'GET';
		}
	}