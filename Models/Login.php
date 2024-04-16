<?php 
	
	/**
	* 
	*/
	class Login extends Connection
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getDataModel($columns,$table){
			return '';
		}
		function execute_function($function, $params){
			return $this->db->execute_function($function, $params);
		}

	}

 ?>