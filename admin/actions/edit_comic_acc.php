<?php

echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
require_once "../../funciones/autoload.php";

$fileData = $_FILES["portada"]["tmp_name"] ?$_FILES["portada"]: FALSE;

try {
    if( $fileData ){
        if(!empty($_POST["portada_original"])){
            (new Imagen())->borrarImagen("../../img/covers/".$_POST["portada_original"]);
        }
        $nombreImagen = (new Imagen())->subirImagen($fileData,"../../img/covers");
        (new Comic())->reemplazarImagen($nombreImagen, $_POST["id"]);
    }
    (new Comic())->edit(
        $_POST["titulo"],
        $_POST["personaje"],
        $_POST["serie"],
        $_POST["publicacion"],
        $_POST["guionista"],
        $_POST["artista"],
        $_POST["origen"],
        $_POST["editorial"],
        $_POST["precio"],
        $_POST["bajada"], 
        $_POST["volumen"],
        $_POST["numero"],
        $_POST["id"],
    );
    header("Location: ../index.php?sec=admin_comics");
} catch (Exception $e) {
    echo $e->getMessage();
}