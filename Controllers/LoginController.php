<?php 
/**
* 
*/
class LoginController extends Controllers
{

	function __construct()
	{
		parent::__construct();
	}


	public function login(){
		
		$this->view->render($this,'login',"");
	}

	public function signin(){
		
		if(isset($_POST['user'])){
			$params = array(
				$_POST['user'],
				md5($_POST['password']),
				$_POST['empresa']
				);
			$response = $this->model->execute_function('authenticate_user',$params);
			if($response){
				$data = $response[0];
				if($data['client_status'] == 1){
					$_SESSION["datauser"] = $data;
					$_SESSION["db"] = $data["admin_db"];
					
					//define('DB_NAME', $data["admin_db"]);
					//$this->model->db->link->pg_close($this->model->db->link);
					//$this->model->db->disconect();
					//$this->model->db = new QueryManager('localhost','postgres','Master7228',$data["admin_db"]);

					if($this->model->db->link != false){
						echo "App/app";
					}else{
						echo 1;
					}
				}else{
					echo 1;
				}
			}else{
				echo 0;
			}	
		}
	}
}

 ?>