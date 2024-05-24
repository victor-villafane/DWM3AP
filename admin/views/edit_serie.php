<?php
    $id = $_GET['id'];
    $serie = (new Serie())->get_x_id($id);
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Agregar Serie</h1>
        <div class="row mb-5 d-flex align-items-center">
			
        <form class="row g-3" action="actions/edit_serie_acc.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value=<?= $serie->getId() ?> >
		<div class="col-md-6 mb-3">
			<label for="nombre" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $serie->getNombre() ?>">
		</div>
		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">Historia</label>
			<textarea class="form-control" id="bio" name="historia" rows="3"><?=  $serie->getHistoria()?></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Editar</button>
	</form>
            

        </div>


    </div>
</div>