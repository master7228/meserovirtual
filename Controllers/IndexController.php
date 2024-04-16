<?php 

/**
* 
*/
class IndexController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
		//$response = $this->model->getDataModel('*','tbl_tickets');
		$this->view->render($this,'index');

	}
}

 ?>