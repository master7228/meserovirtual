<?php
@session_start();
if($_SESSION["autentica"] != "SIP"){
    header("Location: /sahm");
    exit();
}else{
    $datosUser = explode(",",(explode("=",$_SESSION['datauser']))[1]); 
}
?>