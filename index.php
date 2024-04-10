<?php 
include_once "includes/productos.php";
/*echo "<pre>";
print_r($productos);
echo "</pre>";*/
$seccion = isset( $_GET["sec"] ) ? $_GET["sec"] : "home";
//$seccion = $_GET["sec"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tiendita de Comics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <?php require "includes/nav.php" ?>
    <?php file_exists("views/$seccion.php") ? require "views/$seccion.php" : require "views/home.php" ?>
    <?php require_once "includes/footer.php" ?>
</body>

</html>
