<?php
require_once "../../funciones/autoload.php";

$email =  $_POST["email"];
$pass =  $_POST["pass"];

$login = (new Autentificacion())->log_in($email, $pass);

if($login){
    header("Location: ../index.php");
    (new Alerta())->add_alerta("Bienvenido", "success");
}else{
    (new Alerta())->add_alerta("Usuario o contraseña incorrecto", "danger");
    header("Location: ../index.php?sec=login");
}