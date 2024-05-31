<?php

require_once "../../funciones/autoload.php";
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

try {
    $name = (new Imagen())->subirImagen($_FILES["portada"], "../../img/covers");
    (new Comic())->insert(
        $_POST["titulo"],
        $_POST["personaje"],
        $_POST["serie"],
        $_POST["publicacion"],
        $_POST["guionista"],
        $_POST["artista"],
        $_POST["origen"],
        $_POST["editorial"],
        $_POST["precio"],
        $name,
        $_POST["bajada"], 
        $_POST["volumen"],
        $_POST["numero"]);
    header( "Location: ../index.php?sec=admin_comics" );
} catch (Exception $e) {
    // echo $e->getMessage();
    die( $e->getMessage() );
}
