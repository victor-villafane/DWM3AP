<?php


$miCarrito = new Carrito();
$items = $miCarrito->get_carrito();
// echo "<pre>";
// print_r($items);
// echo "</pre>";
?>

<h1 class="text-center fs-2 my-5"> Carrito de Compras</h1>
<div class="container my-4">
    <?= (new Alerta())->get_alertas() ?>
    <?php if( count($items) ){ ?>
    <form action="admin/actions/update_carrito_acc.php">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="15%">Portada</th>
                    <th scope="col">Datos del producto</th>
                    <th scope="col" width="15%">Cantidad</th>
                    <th class="text-end" scope=" col" width="15%">Precio Unitario</th>
                    <th class="text-end" scope="col" width="15%">Subtotal</th>
                    <th class="text-end" scope="col" width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $id => $item) { ?>
                    <tr>
                        <td><img src="img/covers/<?= $item["portada"] ?>" alt="Imagen ilustrativa <?= $item["portada"] ?>" class="img-fluid rounded shadow-sm"></td>
                        <td class="align-middle">
                            <h2 class="h5"><?= $item['titulo'] ?></h2>
                        </td>
                        <td class="align-middle">
                            <label for="c_<?= $id ?>">Cantidad</label>
                            <input type="number" value="<?= $item["cantidad"] ?>" name="c[<?= $id ?>]">
                        </td>
                        <td class="text-end align-middle">
                            <h2 class="h5 py-3"><?= $item['precio'] ?></h2>
                        </td>
                        <td class="text-end align-middle">
                            <h2 class="h5 py-3"><?= $item['precio']*$item["cantidad"] ?></h2>
                        </td>
                        <td class="text-end align-middle">
                            <a href="admin/actions/remove_item_acc.php?id=<?= $id ?>" class="btn btn-danger" >Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-warning">Actualizar cantidades</button>
            <a class="btn btn-success" href="index.php?sec=todosLosComics">Seguir comprando</a>
            <a class="btn btn-danger" href="admin/actions/vaciar_carrito_acc.php">Vaciar Carrito</a>
            <a class="btn btn-secondary" href="#">Finalizar Compra</a>
        </div>

    </form>
    <?php } else{ ?>
        <h2 class="text-center mb-5 text-danger">Su carrito esta vacio</h2>
        <a class="btn btn-success" href="index.php?sec=todosLosComics">Seguir comprando</a>

    <?php } ?>
</div>
