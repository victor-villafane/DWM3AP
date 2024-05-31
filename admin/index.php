<?php
require_once '../funciones/autoload.php';
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'dashboard';
$vistas = '404';

$vistasValidas = [
    'dashboard' => [
        'titulo' => 'Administracion',
    ],
    '404' => [
        'titulo' => 'Pagina no encontrada',
    ],
    'admin_personajes' => [
        'titulo' => 'administracion de personajes'
    ],
    'add_personaje' => [
        'titulo' => 'Agregar personaje'
    ],
    'delete_personaje' => [
        'titulo' => 'Seguro que quieres Eliminar?'
    ],
    'edit_personaje' => [
        'titulo' => "Editar personaje"
    ],
    "admin_series" => [
        "titulo" => "Administracion de series"
    ],
    'add_serie' => [
        'titulo' => 'Agregar Serie'
    ],  
    'delete_serie' => [
        'titulo' => 'Seguro que quieres Eliminar?'
    ],   
    'edit_serie' => [
        'titulo' => 'Editar Serie'
    ],    
    "admin_guionistas" => [
        "titulo" => "Administracion de Guionistas"
    ],
    "admin_artistas" => [
        "titulo" => "Administracion de Artistas"
    ],
    "admin_comics" => [
        "titulo" => "Administracion de Comics"
    ],
    'add_comic' => [
        'titulo' => 'Agregar Comic'
    ],  
    "edit_comic" => [
        "titulo" => "Editar Comic"
    ]                    
];

if (array_key_exists($seccion, $vistasValidas)) {
    $vistas = $seccion;
    $titulo = $vistasValidas[$seccion]['titulo'];
} else {
    $titulo = 'Pagina no encontrada';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?> </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La Tiendita de Comics</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=dashboard">dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_personajes">Personajes</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_series">Series</a>
                    </li>      
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_guionistas">Guionistas</a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_artistas">Artistas</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=admin_comics">Comics</a>
                    </li>                                                                                             
                </ul>
            </div>
        </div>
    </nav>
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require 'views/dashboard.php'; ?>
</body>

</html>
