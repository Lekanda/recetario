<main class="contenedor seccion main-crear">
    <h1 class="titulo-main">Crear Categorias</h1>

    <?php
        if ($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
            if ($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php }
        }
    ?>

    <a href="/admin" class="boton boton-verde btn-volver">Volver</a>

     <!-- Errores -->
     <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" >
        <?php include __DIR__ . '/formulario-categoria.php' ?>
        <input type="submit" value="Crear Categoria" class="boton boton-verde btn-bajo-form">
    </form>
    
</main>