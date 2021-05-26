<main class="contenedor seccion">
        <h1>Listado Recetas</h1>
        
        <!-- <?php  
            if ($resultado) {
                $mensaje = mostrarNotificacion(intval($resultado));
                if ($mensaje) { ?>
                    <p class="alerta exito"><?php echo s($mensaje)?></p>
                <?php }
            }
        ?> -->
        

        <a href="/receta/crear" class="boton boton-verde">Nueva Receta</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="cuerpo-tabla-propiedades"><!-- Mostrar los resultados -->
                <?php foreach($recetas as $receta) : ?>
                    <tr class="ficha-receta">
                        <!-- <td> <?php echo $receta->id; ?> </td> -->
                        <td><?php echo $receta->titulo; ?></td>
                        <td>
                            <?php
                                echo substr($receta->descripcion, 0,200);
                            ?>
                            <br>
                            <a href="#">Leer Mas</a>
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

</main>