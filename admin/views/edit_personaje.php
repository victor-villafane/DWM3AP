<?php
    $id = $_GET['id'];
    $personaje = (new Personaje())->get_x_id($id);
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Edicion de Personaje</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="actions/edit_personaje_acc.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $personaje->getId() ?>" >
		<div class="col-md-6 mb-3">
			<label for="nombre" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre" value=<?= $personaje->getNombre() ?>>
		</div>

		<div class="col-md-6 mb-3">
			<label for="alias" class="form-label">Alias</label>
			<input type="text" class="form-control" id="alias" name="alias" value=<?= $personaje->getAlias() ?>>
		</div>

		<div class="col-md-6 mb-3">
            <img src="../img/personajes/<?= $personaje->getImagen()?>">
			<label for="imagen" class="form-label">Imagen</label>
			<input class="form-control" type="file" id="imagen" name="imagen" >
			<input type="hidden" name="imagen_original" value="<?= $personaje->getImagen() ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="primera_aparicion" class="form-label">Primera aparición</label>
			<input type="text" class="form-control" id="primera_aparicion" name="primera_aparicion" value=<?= $personaje->getPrimeraAparicion() ?>>
		</div>

		<div class="col-md-12 mb-3">
			<label for="creador" class="form-label">Creador(es)</label>
			<input type="text" class="form-control" id="creador" name="creador" value=<?= $personaje->getCreador() ?>>
		</div>

		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">Biografia</label>
			<textarea class="form-control" id="bio" name="biografia" rows="3"><?= $personaje->getBiografia() ?></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Editar</button>
	</form>
            

        </div>


    </div>
</div>