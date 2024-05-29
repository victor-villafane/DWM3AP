<?php
	$series = (new Serie())->catalogo_completo();
	$guionistas = (new Guionista())->catalogo_completo();
	$artistas = (new Artista())->catalogo_completo();
	$personajes = (new Personaje())->catalogo_completo();
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Agregar comic</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="actions/add_comic_acc.php" method="POST" enctype="multipart/form-data">
		<div class="col-md-6 mb-3">
			<label for="titulo" class="form-label">Titulo</label>
			<input type="text" class="form-control" id="titulo" name="titulo">
		</div>

		<div class="col-md-6 mb-3">
			<label for="personaje" class="form-label">personaje</label>
			<select class="form-select" name="personaje" id="personaje">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($personajes as $personaje) { ?>
					<option value="<?= $personaje->getId() ?>" > <?= $personaje->getNombre() ?> </option>
				<?php } ?>
			</select>
		</div>

		<div class="col-md-6 mb-3">
			<label for="serie" class="form-label">serie</label>
			<select class="form-select" name="serie" id="serie">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($series as $serie) { ?>
					<option value="<?= $serie->getId() ?>" > <?= $serie->getNombre() ?> </option>
				<?php } ?>
			</select>
		</div>

		<div class="col-md-6 mb-3">
			<label for="portada" class="form-label">portada</label>
			<input class="form-control" type="file" id="portada" name="portada">
		</div>

		<div class="col-md-6 mb-3">
			<label for="publicacion" class="form-label">Publicacion</label>
			<input type="text" class="form-control" id="publicacion" name="primera_aparicion">
		</div>

		<div class="col-md-12 mb-3">
			<label for="guionista" class="form-label">guionista</label>
			<select class="form-select" name="guionista" id="guionista">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($guionistas as $guionista) { ?>
					<option value="<?= $guionista->getId() ?>" > <?= $guionista->getNombreCompleto() ?> </option>
				<?php } ?>
			</select>		
		</div>

		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">artista</label>
			<select class="form-select" name="artista" id="artista">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($artistas as $artista) { ?>
					<option value="<?= $artista->getId() ?>" > <?= $artista->getNombreCompleto() ?> </option>
				<?php } ?>
			</select>		</div>

		<div class="col-md-12 mb-3">
			<label for="origen" class="form-label">origen</label>
			<select name="origen" id="origen">
				<option value="" selected disabled>Elija una opcion</option>
				<option>Estados Unidos</option>
				<option>China</option>
				<option>Brazil</option>
			</select>
		</div>

		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">editorial</label>
			<input type="text" class="form-control" id="editorial" name="editorial">
		</div>

		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">precio</label>
			<input type="text" class="form-control" id="precio" name="precio">
		</div>

		
		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">bajada</label>
			<textarea class="form-control" name="bajada" id="" cols="30" rows="10"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Cargar</button>
	</form>
            

        </div>


    </div>
</div>