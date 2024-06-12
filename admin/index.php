<?php
require_once '../funciones/autoload.php';
$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'dashboard';
$vistas = '404';

$vistasValidas = [
    'dashboard' => [
        'titulo' => 'Administracion',
        'restringido' => true,
    ],
    '404' => [
        'titulo' => 'Pagina no encontrada',
        'restringido' => false,
    ],
    'admin_personajes' => [
        'titulo' => 'administracion de personajes',
        'restringido' => true,
    ],
    'add_personaje' => [
        'titulo' => 'Agregar personaje',
        'restringido' => true,
    ],
    'delete_personaje' => [
        'titulo' => 'Seguro que quieres Eliminar?',
        'restringido' => true,
    ],
    'edit_personaje' => [
        'titulo' => 'Editar personaje',
        'restringido' => true,
    ],
    'admin_series' => [
        'titulo' => 'Administracion de series',
        'restringido' => true,
    ],
    'add_serie' => [
        'titulo' => 'Agregar Serie',
        'restringido' => true,
    ],
    'delete_serie' => [
        'titulo' => 'Seguro que quieres Eliminar?',
        'restringido' => true,
    ],
    'edit_serie' => [
        'titulo' => 'Editar Serie',
        'restringido' => true,
    ],
    'admin_guionistas' => [
        'titulo' => 'Administracion de Guionistas',
        'restringido' => true,
    ],
    'admin_artistas' => [
        'titulo' => 'Administracion de Artistas',
        'restringido' => true,
    ],
    'admin_comics' => [
        'titulo' => 'Administracion de Comics',
        'restringido' => true,
    ],
    'add_comic' => [
        'titulo' => 'Agregar Comic',
        'restringido' => true,
    ],
    'edit_comic' => [
        'titulo' => 'Editar Comic',
        'restringido' => true,
    ],
    'login' => [
        'titulo' => 'Login!',
        'restringido' => false,
    ],
    'register' => [
        'titulo' => 'Registro de usuario',
        'restringido' => false,
    ],
];

if (array_key_exists($seccion, $vistasValidas)) {
    $vistas = $seccion;
    $titulo = $vistasValidas[$seccion]['titulo'];
    if ($vistasValidas[$seccion]['restringido']) {
        (new Autentificacion())->verify();
    }
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
                    <?php if( isset($_SESSION["login"] )) {?>
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
                    <li class="nav-item">
                        <a class="nav-link" href="actions/auth_logout.php">Salir</a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?sec=login">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?php file_exists("views/$vistas.php") ? require "views/$vistas.php" : require 'views/dashboard.php'; ?>
</body>

</html>
