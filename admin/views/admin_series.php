<?php

$series = (new Serie())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion Series</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Historia</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($series as $serie) { ?>
                    <tr>
                        <td><?= $serie->getId() ?> </td>
                        <td><?= htmlspecialchars($serie->getNombre()) ?> </td>
                        <td><?= htmlspecialchars($serie->getHistoria()) ?> </td>
                        <td>
                            <a href="index.php?sec=edit_serie&id=<?= $serie->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_serie&id=<?= $serie->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_serie" class="btn btn-primary mt-5">Agregar Serie</a>
        </div>
    </div>
</div>
