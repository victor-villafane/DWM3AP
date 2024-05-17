<?php
require_once "../../funciones/autoload.php";
// echo "<pre>";
// print_r($_POST);
// echo "<br>";
// print_r($_FILES);
// echo "</pre>";
try {
    $name = (new Imagen())->subirImagen($_FILES["imagen"], "../../img/personajes");
    (new Personaje())->insert(
        $_POST["nombre"], 
        $_POST["alias"], 
        $_POST["biografia"], 
        $_POST["creador"], 
        $_POST["primera_aparicion"],
        $name
    );
    header( "Location: ../index.php?sec=admin_personajes" );
} catch (Exception $e) {
    // echo $e->getMessage();
    die( $e->getMessage() );
}
