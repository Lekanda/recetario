<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="receta[titulo]" placeholder="Titulo Receta, 4 letras minimo" value="<?php echo s($receta->titulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="receta[imagen]">

    <?php if ($receta->imagen) :?>
        <img src="/imagenes/<?php echo $receta->imagen ?>" alt="Imagen receta" class="imagen-small">
    <?php endif; ?>

    <label for="ingredientes">Ingredientes:</label>
    <textarea id="ingredientes" name="receta[ingredientes]" placeholder="Ingredientes 10 letras mininmo"><?php echo s($receta->descripcion); ?></textarea>


    <label for="descripcion">Descripcion:</label>
    <textarea id="descripcion" name="receta[descripcion]" placeholder="Descripcion receta, 10 letras minimo"><?php echo s($receta->descripcion); ?></textarea>
</fieldset>


