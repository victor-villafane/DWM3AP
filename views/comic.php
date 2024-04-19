<?php
    
    $id = $_GET["id"];
    //$productos = catalogo_completo();
    $comic = (new Comic() )->catalogo_x_id($id);
?>

<h1 class="text-center my-5"><?= $id ?></h1>

<div class="row">
    <?php //foreach ($comics as $comic) { ?>
        <div class="col-3">
        <div class="card mb-3">
            <img class="card-img-top" src="img/covers/<?= $comic->getPortada() ?>"/>
            <div class="card-body">
                <p class="fs-6 m-0 fw-bold text-danger"><?= $comic->getSerie() ?></p>
                <h5 class="card-title"><?= $comic->getTitulo() ?><h5>
                <p class="card-text"><?= recortar_descripcion($comic->getBajada()) ?></p>
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
    <?php // } ?>
</div>