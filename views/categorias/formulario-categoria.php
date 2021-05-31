<fieldset>
    <legend>Informacion General de Categorias</legend>

    <label for="nombre">Nombre de Categoria:</label>
    <input type="text" id="nombre" name="categoria[nombre]" placeholder="Titulo Categoria, 4 letras minimo" value="<?php echo s($categoria->nombre); ?>">

    <label for="descripcion">Descripcion de Categoria:</label>
    <input type="text" id="descripcion" name="categoria[descripcion]" placeholder="Descripcion de Categoria" value="<?php echo s($categoria->descripcion); ?>">
</fieldset>


