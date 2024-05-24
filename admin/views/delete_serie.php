<?php
    $id = $_GET["id"] ?? FALSE;
    $serie = (new Serie())->get_x_id($id);
?>

<a href="actions/delete_serie_acc.php?id=<?= $serie->getId() ?>" class="d-block btn btn-sm btn-danger">Eliminar</a>
<a href="index.php?sec=admin_series">Cancelar</a>
