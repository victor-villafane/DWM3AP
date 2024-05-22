<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Personajes</h1>
        <div class="row mb-5 d-flex align-items-center">

        <form class="row g-3" action="actions/add_personaje_acc.php" method="POST" enctype="multipart/form-data">
		<div class="col-md-6 mb-3">
			<label for="nombre" class="form-label">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="nombre">
		</div>

		<div class="col-md-6 mb-3">
			<label for="alias" class="form-label">Alias</label>
			<input type="text" class="form-control" id="alias" name="alias">
		</div>

		<div class="col-md-6 mb-3">
			<label for="imagen" class="form-label">Imagen</label>
			<input class="form-control" type="file" id="imagen" name="imagen">
		</div>

		<div class="col-md-6 mb-3">
			<label for="primera_aparicion" class="form-label">Primera aparición</label>
			<input type="text" class="form-control" id="primera_aparicion" name="primera_aparicion">
		</div>

		<div class="col-md-12 mb-3">
			<label for="creador" class="form-label">Creador(es)</label>
			<input type="text" class="form-control" id="creador" name="creador">
		</div>

		<div class="col-md-12 mb-3">
			<label for="bio" class="form-label">Biografia</label>
			<textarea class="form-control" id="bio" name="biografia" rows="3"></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Cargar</button>
	</form>
            

        </div>


    </div>
</div>