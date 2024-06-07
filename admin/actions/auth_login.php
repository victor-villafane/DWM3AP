<?php
require_once "../../funciones/autoload.php";

$email =  $_POST["email"];
$pass =  $_POST["pass"];
$usuario = (new Usuario())->usuario_x_email($email);
if($usuario->getPassword() == $pass){
    $datosLogin["usuario"] = $usuario->getNombre_usuario();
    $datosLogin["rol"] = $usuario->getRoles();
    $datosLogin["id"] = $usuario->getId();
    $_SESSION["login"] = $datosLogin;
}

header("Location: ../index.php");