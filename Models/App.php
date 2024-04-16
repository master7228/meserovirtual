<?php 
	
	/**
	* 
	*/
	class App extends Connection
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function getDataModel($columns,$table){
			return $this->db->select($columns,$table,'1');
		}
	}

 ?>