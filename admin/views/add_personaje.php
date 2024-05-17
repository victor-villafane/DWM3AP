<div>
    <h1>Agregar personaje</h1>
    <form action="actions/add_personaje_acc.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <label for="">Alias</label>
        <input type="text" name="alias">
        <label for="">Imagen</label>
        <input type="file" name="imagen">
        <label for="">Primera aparicion</label>
        <input type="number" name="primera_aparicion">
        <label for="">Creador</label>
        <input type="text" name="creador">    
        <label for="">Biografia</label>
        <input type="text" name="biografia">    
        <button type="submit">Cargar</button>
    </form>
</div>
