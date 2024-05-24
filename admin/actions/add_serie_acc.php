<?php
require_once "../../funciones/autoload.php";
// echo "<pre>";
// print_r($_POST);
// echo "<br>";
// print_r($_FILES);
// echo "</pre>";
try {
    (new Serie())->insert(
        $_POST["nombre"], 
        $_POST["historia"], 
    );
    header( "Location: ../index.php?sec=admin_series" );
} catch (Exception $e) {
    // echo $e->getMessage();
    die( $e->getMessage() );
}
