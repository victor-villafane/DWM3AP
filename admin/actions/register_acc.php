<?php

require_once "../../funciones/autoload.php";

$email =  $_POST["email"];
$pass =  $_POST["pass"];
try {
    $usuario = (new Usuario())->usuario_x_email($email);
    if($usuario){
        //Mostrar una alerta
    }else{
        (new Usuario())->insert($email, $pass);
    }
    header("Location: ../index.php?sec=login");
} catch (Exception $e) {
    echo $e->getMessage();
    header("Location: ../index.php?sec=register");
}
