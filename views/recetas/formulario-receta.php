<fieldset>
    <legend>Informacion Receta</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="receta[titulo]" placeholder="Titulo Receta, 4 letras minimo" value="<?php echo s($receta->titulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="receta[imagen]">

    <?php if ($receta->imagen) :?>
        <img src="/imagenes/<?php echo $receta->imagen ?>" alt="Imagen receta" class="imagen-small">
    <?php endif; ?>




    <label for="ingredientes">Ingredientes:</label>
    <textarea class="fondo-campo" id="ingredientes" name="receta[ingredientes]" placeholder="Ingredientes 10 letras mininmo"><?php echo s($receta->descripcion); ?></textarea>




    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="receta[descripcion]" placeholder="Descripcion receta, 10 letras minimo"><?php echo s($receta->descripcion); ?></textarea>

    <input type="hidden" name="receta[usuarioId]" value="<?php echo $receta->usuarioId; ?>">
</fieldset>

<fieldset>
    <legend>Selecciona una Categoria</legend>
    <label for="categoria">categoria</label>
    <select name="receta[categoriaId]" id="categoria">
        <option selected value="">-- Selecciona un categoria --</option>
        <?php foreach ($categorias as $categoria) { ?>
            <option <?php echo $categoria->id === $receta->categoriaId ? 'selected' : '' ?> value="<?php echo s($categoria->id) ?>">
                <?php echo s($categoria->nombre);?>
            </option>
        <?php } ?>
    </select>
</fieldset>


