<?php

$comics = (new Comic())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de comics</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Portada</th>
                        <th scope="col">Titulo</th>
                        <th scope="col" >Personaje Principal</th>
                        <th scope="col">Bajada</th>
                        <th scope="col">Guionistas</th>
                        <th scope="col">Artistas</th>
                        <th scope="col" >Precio</th>
                        <th scope="col" >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($comics as $comic) { ?>
                    <tr>
                        <td> <img src="../img/covers/<?= $comic->getPortada() ?>" alt="Imagen del comic" class="img-fluid rounded shadow-sm"> </td>
                        <td><?= $comic->getTitulo() ?> </td>
                        <td> <?= $comic->getPersonaje() ?> </td>
                        <td><?= $comic->getBajadaReducida() ?> </td>
                        <td><?= $comic->getGuion() ?></td>
                        <td> <?= $comic->getArte() ?> </td>
                        <td><?= $comic->getPrecio() ?></td>
                        <td>
                            <a href="index.php?sec=edit_comic&id=<?= $comic->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_comic&id=<?= $comic->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_comic" class="btn btn-primary mt-5">Agregar Comic</a>
        </div>
    </div>
</div>
