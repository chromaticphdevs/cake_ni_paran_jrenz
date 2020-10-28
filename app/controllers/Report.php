<?php 	

	class Report extends Controller
	{

		public function index()
		{
			isAllowed(['admin', 'client']) or notAuthorized();
			$data = [
				'title' => 'Report Generation'
			];

			$this->view('report/generate' , $data);
		}
		public function generate()
		{
			isAllowed(['admin', 'client']) or notAuthorized();

			$this->reportModel = $this->model('reportModel');

			if($this->request() === 'POST')
			{
				$data = [
					'report' => $this->reportModel->getReport($_POST['start'] , $_POST['end']) ,
					'title'  => 'Report View'
				];

				$this->view('report/view' , $data);
			}
		}
	}