<?php
require_once "../../funciones/autoload.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

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
    header("Location: ../index.php?sec=admin_personajes");
} catch (Exception $e) {
    echo $e->getMessage();
}