<?php

class Autentificacion{
    public function log_in($email, $pass){
        $usuario = (new Usuario())->usuario_x_email($email);
        if(isset($usuario)){
            if(password_verify($pass, $usuario->getPassword())){
                $datosLogin["usuario"] = $usuario->getNombre_usuario();
                $datosLogin["rol"] = $usuario->getRoles();
                $datosLogin["id"] = $usuario->getId();
                $_SESSION["login"] = $datosLogin;
                return true;
            }
        }
        return false;
    }
    public function log_out(){
        if(isset($_SESSION["login"])){
            unset($_SESSION["login"]); 
        }
    }
    public function verify(){
        if(isset($_SESSION["login"]) 
            && ($_SESSION["login"]["rol"] == "admin" || $_SESSION["login"]["rol"] == "superadmin") 
        ){
            return true;
        }else{
            header("Location: index.php?sec=login");
        }
    }
}