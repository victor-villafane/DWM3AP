<?php 
//include_once "includes/productos.php";
// require_once "class/Comic.php";
// require_once "class/Conexion.php";
// require_once "class/Serie.php";
// require_once "class/Artista.php";
require_once "funciones/autoload.php";
/*echo "<pre>";
print_r($productos);
echo "</pre>";*/
$seccion = isset( $_GET["sec"] ) ? $_GET["sec"] : "home";
//$seccion = $_GET["sec"];
$vistas = "404";

$vistasValidas = [
    "home" => [
        "titulo" => "Bienvenidos",
    ],
    "comics" => [
        "titulo" => "Comics"
    ],
    "comic" => [
        "titulo" => "Comic"
    ],
    "todosLosComics" => [
        "titulo" => "Todos los Comics"
    ],
    "envios"=> [
        "titulo" => "Envios"
    ],
    "quienes_somos" => [
        "titulo" => "Quienes Somos?"
    ],
    "404" => [
        "titulo" => "Pagina no encontrada"
    ],

];

if( array_key_exists($seccion, $vistasValidas) ){
    $vistas = $seccion;
    $titulo = $vistasValidas[$seccion]["titulo"];
}else{
    $titulo = "Pagina no encontrada";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tiendita de Comics <?= $titulo ?> </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <?php require "includes/nav.php" ?>
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require "views/home.php" ?>
    <?php require_once "includes/footer.php" ?>
</body>

</html>
