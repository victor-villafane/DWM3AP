<?php
require_once "../../funciones/autoload.php";

$id = $_GET["id"] ?? false;

if($id){
    (new Carrito())->delete_item_carrito($id);
    header("location: ../../index.php?sec=carrito");
}
header("location: ../../index.php?sec=carrito");