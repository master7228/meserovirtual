<?php 

/**
* 
*/
class ClientController extends Controllers
{

	function __construct()
	{
		parent::__construct();
	}

	public function list(){
			$attr = "";
			$params = array();
			$response = $this->model->execute_function('fc_clients_select_all',$params);
			$this->view->render($this,'list',$response);


	}


	public function create(){
			if(isset($_POST['nit'])){
				$params = array(
					$_POST['nit']		
					);
				$response = $this->model->execute_function('fn_get_client_by_nit',$params);
				if (count($response) == 0) {
					$query = "CREATE DATABASE ".$_POST['db']." WITH OWNER postgres";
					$this->model->execute_query($query);

					
					$params = array(
						$_POST['business_name'],
						$_POST['nit'],
						$_POST['email'],
						$_POST['legal_representative_name'],
						$_POST['legal_representative_lastname'],
						$_POST['address'],
						$_POST['phone'],
						$_POST['nameuser'],
						$_POST['lastnameuser'],
						$_POST['namelogin'],
						$_POST['user'],
						$_POST['password'],
						$_POST['db']
						);
					$response = $this->model->execute_function('fn_client_save',$params);
					print_r($params);
					//echo 1;
				} else {
					echo 0;
				}
			}else{
				$this->view->render($this,'create',array(1)); 
			}

	}













	public function signin(){
		if(isset($_POST['user'])){
			$params = array(
				$_POST['user'],
				md5($_POST['password']),
				$_POST['empresa']
				);
			$response = $this->model->execute_function('authenticate_user',$params);
			//print_r($response);
			
			if($response){
				if($response[15] == 1){
					$_SESSION["datauser"] = $response;
					echo "App/app";
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