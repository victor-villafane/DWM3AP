<?php

$personajes = (new Personaje())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion de personajes</h1>
        <div class="row mb-5 d-flex align-items-center">
        <?= (new Alerta())->get_alertas() ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Alias</th>
                        <th scope="col">Creador</th>
                        <th scope="col">Primera aparicion</th>
                        <th scope="col">Biografia</th>
                        <th scope="col" >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($personajes as $personaje) { ?>
                    <tr>
                        <td> <img src="../img/personajes/<?= $personaje->getImagen() ?>" alt="Imagen del personaje" class="img-fluid rounded shadow-sm"> </td>
                        <td><?= $personaje->getNombre() ?> </td>
                        <td><?= $personaje->getAlias() ?> </td>
                        <td><?= $personaje->getCreador() ?></td>
                        <td> <?= $personaje->getPrimeraAparicion() ?> </td>
                        <td><?= $personaje->getBiografia() ?></td>
                        <td>
                            <a href="index.php?sec=edit_personaje&id=<?= $personaje->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_personaje&id=<?= $personaje->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_personaje" class="btn btn-primary mt-5">Agregar Personaje</a>
        </div>
    </div>
</div>
