<?php

class Alerta{
    public function add_alerta($mensaje, $tipo){
        $_SESSION["alertas"] []= [
            "tipo" => $tipo,
            "mensaje" => $mensaje
        ]; 
    }

    public function get_alertas(){
        if(!empty($_SESSION["alertas"])){
            $html = "";
            foreach ($_SESSION["alertas"] as $alerta) {
                $html .= $this->print_alerta($alerta["mensaje"], $alerta["tipo"]);
            }
            $this->clear_alertas();
            return $html;
        }
    }

    public function clear_alertas()
    {
        $_SESSION["alertas"] = []; 
    }

    public function print_alerta($mensaje, $tipo){
        $html = "<div class='alert alert-$tipo alert-dismissible fade show' role='alert'>";
        $html .= $mensaje;
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";  
        return $html;
    }
}