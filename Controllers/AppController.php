<?php 

/**
* 
*/
class AppController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function app(){
		$this->view->render($this,'app',"");

	}
}

 ?>