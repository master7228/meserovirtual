<?php 
/**
* 
*/
class SedeController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


			public function list(){
	
				$attr = "";
				$params = array();
				$response = $this->model->execute_function('fn_sedes_select_all',$params);
				$this->view->render($this,'list',$response);

		
			}

			public function edit($value){
					if(isset($_POST['sedeid'])){
						$params = array(
							$_POST['sedeid']
							);
						$response = $this->model->execute_function('fn_sedes_select_by_id',$params);
						$validate = false;
			
						if($_POST['sedenombre'] != $response[0]['nombre']){
							$params = array(
								$_POST['sedenombre']
								);
							$response = $this->model->execute_function('fn_sedes_select_by_name',$params);
							$validate = $response != NULL ? true : false;
						}
						echo $validate;
						/*if ($validate == false) {
							$attr = "@id=?, @codigo=?, @nombre=?, @descripcion=? ";
							$myparams['@id']=$_POST['zonid'];
							$myparams['@codigo']=$_POST['zoncodigo'];
							$myparams['@nombre']=$_POST['zonnombre'];
							$myparams['@descripcion']=$_POST['zondescripcion'];
							$params = array(
								$_POST['sedeid'],
								$_POST['sedenombre'],
								$_POST['sededireccion'],
								$_POST['sedetelefono']
					
								);
							$response = $this->model->execute_function('fn_sedes_update',$params);
							echo 1;
						} else {
							echo 0;
						}*/
					
					}else{
						$params = array(
							$value
							);
						$response = $this->model->execute_function('fn_sedes_select_by_id',$params);
						//print_r($response);
						$this->view->render($this,'edit',$response);  
					}
		
			}

			public function create(){
					if(isset($_POST['sedenombre'])){

						$params = array(
							$_POST['sedenombre']
				
							);
						$response = $this->model->execute_function('fn_sedes_select_by_name',$params);
						if ($response == NULL) {
							$params = array(
								$_POST['sedenombre'],
								$_POST['sededireccion'],
								$_POST['sedetelefono']
								);
							$response = $this->model->execute_function('fn_sedes_insert',$params);
							echo 1;
						} else {
							echo 0;
						}
					}else{
						$this->view->render($this,'create',array(1)); 
					}
				
					
				
				
			}

			public function getDataOneSede(){
				$params = array(
					$_POST['sedenombre']
					);
				$response = $this->model->execute_function('fn_sedes_select_by_name',$params);
				echo json_encode($response,JSON_FORCE_OBJECT);
		}
}

 ?>