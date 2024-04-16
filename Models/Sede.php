<?php 
	
	/**
	* 
	*/
	class Sede extends Connection
	{
		
		function __construct()
		{
			parent::__construct($_SESSION["db"]);
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