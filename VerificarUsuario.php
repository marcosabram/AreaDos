<?php

    include('./conexionBD.php');

    session_start();
    $con = ConexionBD::getConexion();
    
    //inicializamos las variables recibidas de javascript
    
    $email= filter_input(INPUT_POST, 'email');
    $pass=filter_input(INPUT_POST, 'pass');
    $url = "http://localhost/AreaDosV1.3/Ingresar.php";
    
    
   $consulta = "SELECT email,password,tipo_usuario FROM usuario WHERE email = '$email' AND password = '$pass' ";
   
    $resp = $con->recuperar($consulta);


    if($resp != null){
        $_SESSION["email"]=$resp[0][0];
        $_SESSION["password"]=$resp[0][1];
        $_SESSION["tipo"]=$resp[0][2];
        
        if($resp[0][2] == true)
        {
            
            $url = "http://localhost/AreaDosV1.3/admin.php";

        }
        elseif ($resp[0][2] == false) {
           
            $url = "http://localhost/AreaDosV1.3/user.php";
        }

    }
    
   
   
 
    echo $url;
    
?>    
    
    
    
    
   
    
    
