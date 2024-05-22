<?php
    require_once "../../funciones/autoload.php";
    $id = $_GET["id"] ?? false;
    try {
        if( $id ){
            $personaje = (new Personaje())->get_x_id($id);
            (new Imagen())->borrarImagen( "../../img/personajes/".$personaje->getImagen() );
            $personaje->delete();
            header("Location: ../index.php?sec=admin_personajes");
        }else{
            throw new Exception("No tengo id");
        }
    } catch (Exception $e) {
        echo "<pre>";
        echo $e->getMessage();
        echo "</pre>";
    }
    //NECESITO EL METODO PARA ELIMINAR UNA IMAGEN