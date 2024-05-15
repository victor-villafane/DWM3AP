<?php
    
    $id_personaje = $_GET["serie"];
    //$productos = catalogo_completo();
    $comics = (new Comic())->catalogo_x_personaje($id_personaje);
    $personaje = (new Personaje())->get_x_id($id_personaje);
    // echo "<pre>";
    // print_r($comics);
    // echo "</pre>";

    //$comics = catalogo_x_personaje($productos, $serieSeleccionada);
    //echo $serieSeleccionada;
    //$titulo = $productos[$serieSeleccionada][0]["serie"];

?>

<h1 class="text-center my-5"><?= $personaje->getNombre() ?></h1>

<div class="row">
    <?php foreach ($comics as $comic) { ?>
        <div class="col-3">
        <div class="card mb-3">
            <img class="card-img-top" src="img/covers/<?= $comic->getPortada() ?>"/>
            <div class="card-body">
                <p class="fs-6 m-0 fw-bold text-danger"><?= $comic->getSerie() ?></p>
                <h5 class="card-title"><?= $comic->getTitulo() ?><h5>
                <p class="card-text"><?= $comic->getBajadaReducida() ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Guion: <?= $comic->getGuion() ?></li>
                <li class="list-group-item">Arte: <?= $comic->getArte() ?></li>
                <li class="list-group-item">Publicacion: <?= $comic->getPublicacion() ?></li>
            </ul>
            <div class="card-body">
                <div class="fs-3 mb-3 fw-bold text-center text-danger">$<?= $comic->getPrecio() ?></div>
                <a href="index.php?sec=comic&id=<?= $comic->getId() ?>" class="btn btn-danger w-100 fw-bold">COMPRAR</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>