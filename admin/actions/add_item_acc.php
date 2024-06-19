<?php
require_once "../../funciones/autoload.php";
$id = $_POST["id"] ?? false;
$cantidad = $_POST["c"] ?? 1;

if($id){
    (new Carrito())->add_item($id, $cantidad);
    header("location: ../../index.php?sec=carrito");
}