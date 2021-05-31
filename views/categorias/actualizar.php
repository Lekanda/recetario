<main class="contenedor seccion">
    <h1>Actualizar Categoria</h1>

    <!-- Errores -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <form class="formulario" method="POST">
        <?php include __DIR__ . '/formulario-categoria.php' ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>