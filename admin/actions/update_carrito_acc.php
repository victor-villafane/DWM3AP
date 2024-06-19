<?php
require_once "../../funciones/autoload.php";

echo "<pre>";
print_r($_GET);
echo "</pre>";

if( !empty($_GET["c"]) ){
    (new Carrito())->update_carrito($_GET["c"]);
    (new Alerta())->add_alerta("Carrito actualizado!", "success");
    header("location: ../../index.php?sec=carrito");
}