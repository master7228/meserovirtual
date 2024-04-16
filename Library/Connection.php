<?php 

/**
* 
*/
class Connection extends Controllers
{
	/*private static $HOST = 'localhost';
    private static $USER = 'postgres';
    private static $PASS = 'Master7228';
    public static $DB = $_SESSION["db"];*/
	
	function __construct($db = 'master')
	{
		$HOST = "localhost";//"SERVSQLDLLO1";192.168.1.140
		$USER = "postgres";
		$PASS = "Master7228";
		$DB = $db;

		$this->db = new QueryManager($HOST ,$USER ,$PASS,$DB);
	}
}

 ?>