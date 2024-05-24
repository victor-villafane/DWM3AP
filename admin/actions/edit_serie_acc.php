<?php
require_once "../../funciones/autoload.php";

try {
    (new Serie())->edit(
        $_POST["nombre"], 
        $_POST["historia"], 
        $_POST["id"]
    );
    header("Location: ../index.php?sec=admin_series");
} catch (Exception $e) {
    echo $e->getMessage();
}