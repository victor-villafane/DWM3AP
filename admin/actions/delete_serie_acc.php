<?php
    require_once "../../funciones/autoload.php";
    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $serie = (new Serie())->get_x_id($id);
            $serie->delete();
            header("Location: ../index.php?sec=admin_series");
        }else{
            throw new Exception("No tengo id");
        }
    } catch (Exception $e) {
        echo "<pre>";
        echo $e->getMessage();
        echo "</pre>";
    }
    //NECESITO EL METODO PARA ELIMINAR UNA IMAGEN