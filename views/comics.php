<?php
    
    $serieSeleccionada = $_GET["serie"];
    $productos = catalogo_completo();
    $comics = catalogo_x_personaje($productos, $serieSeleccionada);
    // echo "<pre>";
    // print_r($comics);
    // echo "</pre>";

    //$comics = catalogo_x_personaje($productos, $serieSeleccionada);
    //echo $serieSeleccionada;
    //$titulo = $productos[$serieSeleccionada][0]["serie"];

?>

<h1 class="text-center my-5"><?= correccionTitulo($serieSeleccionada) ?></h1>

<div class="row">
    <?php foreach ($comics as $comic) { ?>
        <div class="col-3">
        <div class="card mb-3">
            <img class="card-img-top" src="img/covers/<?= $comic["portada"] ?>"/>
            <div class="card-body">
                <p class="fs-6 m-0 fw-bold text-danger"><?= $comic["serie"] ?></p>
                <h5 class="card-title"><?= $comic["titulo"] ?><h5>
                <p class="card-text"><?= recortar_descripcion($comic["bajada"]) ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Guion: <?= $comic["guion"] ?></li>
                <li class="list-group-item">Arte: <?= $comic["arte"] ?></li>
                <li class="list-group-item">Publicacion: <?= $comic["publicacion"] ?></li>
            </ul>
            <div class="card-body">
                <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $comic["precio"] ?></div>
                <a href="#" class="btn btn-danger w-100 fw-bold">COMPRAR</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>