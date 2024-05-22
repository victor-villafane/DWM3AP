<?php
    $id = $_GET["id"] ?? FALSE;
    $personaje = (new Personaje())->get_x_id($id);
?>

<a href="actions/delete_personaje_acc.php?id=<?= $personaje->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=admin_personajes">Cancelar</a>
