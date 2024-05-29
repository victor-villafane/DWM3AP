<?php
require_once "class/Conexion.php";
require_once "class/Comic.php";
// $conexion = new Conexion();

// $db = $conexion->getConexion();

// $query = "INSERT INTO personajes VALUES (NULL, 'nombre desde php', 'alias desde php', 'biografia desde php','creador desde php',1989, 'imagen desde php');";

// $PDOStament = $db->prepare($query);

// // $PDOStament->setFetchMode(PDO::FETCH_CLASS, Comic::class);

// $PDOStament->execute();

// $comics = [];

// while($comic = $PDOStament->fetch()){
//     $comics []= $comic;
// }

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

?>

<form action="testeando.php" method="post">
    <input type="text" name="nombre" id="">
    <button type="submit">enviar</button>

    <?= isset($_POST["nombre"]) ?  htmlspecialchars($_POST["nombre"]) : "Nada que mostrar" ?>
</form>