<?php
require_once "../../funciones/autoload.php";

$fileData = $_FILES["imagen"] ?? FALSE;

try {
    if( $fileData ){
        if(!empty($_POST["imagen_original"])){
            (new Imagen())->borrarImagen("../../img/personajes/".$_POST["imagen_original"]);
        }
        $nombreImagen = (new Imagen())->subirImagen($fileData,"../../img/personajes");
        (new Personaje())->reemplazarImagen($nombreImagen, $_POST["id"]);
    }
    (new Personaje())->edit(
        $_POST["nombre"], 
        $_POST["alias"], 
        $_POST["biografia"], 
        $_POST["creador"],
        $_POST["primera_aparicion"],
        $_POST["id"]
    );
    (new Alerta())->add_alerta("Se pudo editar el comic", "success");
    header("Location: ../index.php?sec=admin_personajes");
} catch (Exception $e) {
    echo $e->getMessage();
}