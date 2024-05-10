<?php
require_once "class/Conexion.php";
require_once "class/Comic.php";
$conexion = new Conexion();

$db = $conexion->getConexion();

$query = "SELECT * FROM comics";

$PDOStament = $db->prepare($query);

$PDOStament->setFetchMode(PDO::FETCH_CLASS, Comic::class);

$PDOStament->execute();

$comics = [];

while($comic = $PDOStament->fetch()){
    $comics []= $comic;
}

echo "<pre>";
print_r($comics);
echo "</pre>";


