<main class="contenedor seccion seccion-main">
    <h1 class="titulo-admin">Listado Recetas</h1>

    <!-- <?php
            if ($resultado) {
                $mensaje = mostrarNotificacion(intval($resultado));
                if ($mensaje) { ?>
                    <p class="alerta exito"><?php echo s($mensaje) ?></p>
                <?php }
            }
                ?> -->


    <a href="/receta/crear" class="boton boton-verde btn-nueva-rece">Nueva Receta</a>

    <table class="propiedades">
        <thead>
            <tr class="cabeza-form">
                <!-- <th>ID</th> -->
                <th>Receta</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="cuerpo-tabla-propiedades">
            <!-- Mostrar los resultados -->
            <?php foreach ($recetas as $receta) : ?>
                <tr class="ficha-receta">
                    <td><?php echo $receta->titulo; ?></td>
                    <td>
                        <?php
                        echo substr($receta->descripcion, 0, 350);
                        ?>
                        <br>
                    </td>


                    <td class="imagen-tabla"><img class="imagen-tabla" src="imagenes/<?php echo $receta->imagen; ?>" class="imagen-tabla"></td>


                    <td>
                        <form method="POST" class="w-100" action="/receta/eliminar">
                            <input type="hidden" name="id" value="<?php echo $receta->id; ?>">
                            <input type="hidden" name="tipo" value="receta">

                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/receta/actualizar?id=<?php echo $receta->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <h1>Inline editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        InlineEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script> -->


    
    
    <!-- <script>
        ClassicEditor
            .create(document.querySelector('#ingredientes'), {
                
            })
            .catch(error => {
                console.error(error);
            });
    </script> -->

    <!-- <div id="toolbar-container"></div>
    <div id="editor">
        
    </div>
    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
    </script> -->


</main>