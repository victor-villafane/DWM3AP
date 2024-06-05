<?php
	$series = (new Serie())->catalogo_completo();
	$guionistas = (new Guionista())->catalogo_completo();
	$artistas = (new Artista())->catalogo_completo();
	$personajes = (new Personaje())->catalogo_completo();
	$comic = (new Comic())->catalogo_x_id($_GET["id"]);
?>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Editar comic</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="actions/edit_comic_acc.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $comic->getId() ?>" >
		<div class="col-md-6 mb-3">
			<label for="titulo" class="form-label">Titulo</label>
			<input value="<?= $comic->getTitulo() ?>" type="text" class="form-control" id="titulo" name="titulo">
		</div>

		<div class="col-md-6 mb-3">
			<label for="personaje" class="form-label">personaje</label>
			<select class="form-select" name="personaje" id="personaje">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($personajes as $personaje) { ?>
					<option <?= $personaje->getId() === $comic->getPersonaje_id() ? "selected" : "" ?> value="<?= $personaje->getId() ?>" > <?= $personaje->getNombre() ?> </option>
				<?php } ?>
			</select>
		</div>

		<div class="col-md-6 mb-3">
			<label for="serie" class="form-label">serie</label>
			<select class="form-select" name="serie" id="serie">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($series as $serie) { ?>
					<option <?= $serie->getId() == $comic->getSerie_id() ? "selected" : "" ?> value="<?= $serie->getId() ?>" > <?= $serie->getNombre() ?> </option>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-6 mb-3">
			<label for="publicacion" class="form-label">Publicacion</label>
			<input type="text" class="form-control" id="publicacion" name="publicacion" value="<?= $comic->getPublicacion() ?>">
		</div>				
		<div class="col-md-6 mb-3">
		<label for="imagen" class="form-label">Portada original</label>
            <img src="../img/covers/<?= $comic->getPortada()?>">
			<input type="hidden" name="portada_original" value="<?= $personaje->getImagen() ?>">
		</div>
		<div class="col-md-6 mb-3">
			<label for="portada" class="form-label">Portada</label>
			<input class="form-control" type="file" id="portada" name="portada">
		</div>



		<div class="col-md-6 mb-3">
			<label for="guionista" class="form-label">guionista</label>
			<select class="form-select" name="guionista" id="guionista">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($guionistas as $guionista) { ?>
					<option <?= $guionista->getId() == $comic->getGuionista_id() ? "selected" : "" ?> value="<?= $guionista->getId() ?>" > <?= $guionista->getNombreCompleto() ?> </option>
				<?php } ?>
			</select>		
		</div>

		<div class="col-md-6 mb-3">
			<label for="bio" class="form-label">artista</label>
			<select class="form-select" name="artista" id="artista">
				<option value="" selected disabled>Elija una opcion</option>
				<?php foreach ($artistas as $artista) { ?>
					<option <?= $artista->getId() == $comic->getArtista_id() ? "selected" : "" ?> value="<?= $artista->getId() ?>" > <?= $artista->getNombreCompleto() ?> </option>
				<?php } ?>
			</select>		</div>

		<div class="col-md-6 mb-3">
			<label for="origen" class="form-label">origen</label>
			<select class="form-select" name="origen" id="origen">
				<option value="" selected disabled>Elija una opcion</option>
				<option  <?= $comic->getOrigen() == "Estados Unidos" ? "selected" : "" ?> >Estados Unidos</option>
				<option <?= $comic->getOrigen() == "China" ? "selected" : "" ?>>China</option>
				<option <?= $comic->getOrigen() == "Brazil" ? "selected" : "" ?>>Brazil</option>
			</select>
		</div>

		<div class="col-md-6 mb-3">
			<label for="bio" class="form-label">editorial</label>
			<input type="text" class="form-control" id="editorial" name="editorial" value="<?= $comic->getEditorial() ?>">
		</div>

		<div class="col-md-6 mb-3">
			<label for="bio" class="form-label">precio</label>
			<input value="<?= $comic->getPrecio() ?>" type="text" class="form-control" id="precio" name="precio">
		</div>

		<div class="col-md-6 mb-3">
			<label for="bio" class="form-label">volumen</label>
			<input value="<?= $comic->getVolumen() ?>" type="number" class="form-control" id="volumen" name="volumen">
		</div>

		<div class="col-md-6 mb-3">
			<label for="bio" class="form-label">numero</label>
			<input type="number" class="form-control" id="numero" name="numero" value="<?= $comic->getNumero() ?>">
		</div>
		<div class="col-md-12 mb-3">
                    <label for="bio" class="form-label">Personajes Secundarios</label>
					<?php foreach ($personajes as $personaje) { 
						$ps_seleccionado = explode(",", $comic->getPersonajesSecundarios());
						?>
						<div>
							<input type="checkbox" name="personajes_secundarios[]" id="personaje_secundario_<?= $personaje->getId() ?>" value="<?= $personaje->getId() ?>" <?= in_array($personaje->getId(), $ps_seleccionado) ? "checked" : "" ?> >
							<label for="personaje_secundario_<?= $personaje->getId() ?>">
							<?= $personaje->getNombre() ?>
						</label>
						</div>
					<?php } ?>
                </div>
		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">bajada</label>
			<textarea class="form-control" name="bajada" id="" cols="30" rows="10"><?= $comic->getBajada() ?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Editar</button>
	</form>
            

        </div>


    </div>
</div>