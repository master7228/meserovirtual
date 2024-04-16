<?php

        require("ldap.php");

        header("Content-Type: text/html; charset=utf-8");

        $usr = $_POST["usuario"];

        $usuario = mailboxpowerloginrd($usr,$_POST["clave"]);

        if($usuario == "0" || $usuario == ''){

            $_SERVER = array();

            $_SESSION = array();

            echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); window.location.href='../'; </script>";

        }else{

            //session_start();

            $conn_array = array (

                "UID" => "JOBEDOYA",

                "PWD" => "123456",

                "Database" => "SAHM",

            );

            $conn = sqlsrv_connect('192.168.1.140', $conn_array);
            if ($conn){
                $permisos = new stdClass();
                if(($result = sqlsrv_query($conn,"SELECT u.id, u.usuario, u.nombre, u.correo, u.estado FROM usuarios as u  WHERE u.usuario = '$usr' ")) !== false){
                    if( $objUsuario = sqlsrv_fetch_object( $result )) {
                        //print_r($objUsuario);
                        if($objUsuario->estado == 0){
                            $_SERVER = array(); 
                            $_SESSION = array(); 
                            echo"<script> alert('Usuario inactivo, por favor ponerse en contacto con el administrador!'); window.location.href='../'; </script>"; 
                            exit;
                        }else{
                            $funciones = sqlsrv_query($conn,"SELECT fun.*, m.nombre as modulo FROM funciones_modulos as fun 
                            INNER JOIN modulos as m on m.id = fun.id_modulo WHERE fun.id_usuario = '$objUsuario->id' ");
                            while( $objFunciones = sqlsrv_fetch_object( $funciones )) {

                                $mod = $objFunciones->modulo;

                                $permisos -> $mod  = new stdClass();

                                foreach ($objFunciones as $key => $value) {

                                    if($key != 'date_create' && $key != 'date_update' && $key != 'id' && $key != 'id_perfil' && $key != 'id_modulo' && $key != 'modulo'){

                                        $permisos -> $mod -> $key = $value;

                                    }
                                } 
                            }

                            sqlsrv_query($conn,"INSERT INTO log_login (id_usuario, [date] ) VALUES ('$objUsuario->id', GETDATE())");
                            $_SESSION["user"] = $usuario; 
                            $_SESSION["datauser"] = $objUsuario ; 
                            $_SESSION["autentica"] = "SIP";
                            $_SESSION["permisos"] = $permisos; 
                            echo"<script>window.location.href='../App/app'; </script>";
                        } 
                       
                    }else{ 
                        $_SERVER = array(); 
                        $_SESSION = array(); 
                        echo"<script> alert('Usuario o Perfil no existe en SAHM, por favor ponerse en contacto con el administrador!'); window.location.href='../'; </script>"; 
                        exit;
                    }       
                }else{
                    $_SERVER = array(); 
                    $_SESSION = array(); 
                    echo"<script> alert('Usuario o Perfil no existe en SAHM, por favor ponerse en contacto con el administrador!'); window.location.href='../'; </script>"; 
                    exit;
                }

            }else{

                die(print_r(sqlsrv_errors(), true));

            }

        }

?>