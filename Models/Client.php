<?php 
	
	/**
	* 
	*/
	class Client extends Connection
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
		function execute_query($query){
			return $this->db->execute_query($query);
		}
	}

 ?>