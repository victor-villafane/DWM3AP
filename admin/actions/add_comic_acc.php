<?php

require_once "../../funciones/autoload.php";
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
$personajes_secundarios_ids = $_POST["personajes_secundarios"];
try {
    $name = (new Imagen())->subirImagen($_FILES["portada"], "../../img/covers");
    $id_comic = (new Comic())->insert(
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
        foreach ($personajes_secundarios_ids as $personaje_id) {
            (new Comic())->add_personaje_sec($id_comic, $personaje_id);
        }
    header( "Location: ../index.php?sec=admin_comics" );
} catch (Exception $e) {
    // echo $e->getMessage();
    die( $e->getMessage() );
}
