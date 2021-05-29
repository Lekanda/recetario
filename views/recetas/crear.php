<main class="contenedor seccion main-crear">
    <h1 class="titulo-main">Crear Receta</h1>

    <a href="/admin" class="boton boton-verde btn-volver">Volver</a>

    <!-- Errores -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario-crear-receta.php' ?>

        <input type="submit" value="Crear Receta" class="boton boton-verde btn-bajo-form">
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#ingredientes' ),{
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</main>