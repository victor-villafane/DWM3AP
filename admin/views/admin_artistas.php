<?php

$artistas = (new Artista())->catalogo_completo();

?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administracion Artistas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Foto de Perfil</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Historia</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($artistas as $artista) { ?>
                    <tr>
                        <td><?= $artista->getId() ?> </td>
                        <td>  <img src="../img/artistas/<?= $artista->getFotoPerfil() ?>" alt="">  </td>
                        <td><?= $artista->getNombreCompleto() ?> </td>
                        <td><?= $artista->getBiografia() ?> </td>
                        <td>
                            <a href="index.php?sec=edit_artista&id=<?= $artista->getId() ?>" class="d-block btn btn-sm btn-warning mb-1">Editar</a>
                            <a href="index.php?sec=delete_artista&id=<?= $artista->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?sec=add_guionista" class="btn btn-primary mt-5">Agregar guionista</a>
        </div>
    </div>
</div>
