<?php

namespace Controllers;
use MVC\Router;
use Model\Receta;
use Intervention\Image\ImageManagerStatic as Image;


class RecetaController{
    public static function index (Router $router) {
        // debuguear($router);
        $recetas = Receta::all();
        // debuguear($recetas);

        $router->render('/recetas/admin',[
            'recetas' => $recetas
        ]);
    }

    public static function crear (Router $router) {

        $receta = new Receta();

        // Arreglo con mensajes de errores
        $errores = Receta::getErrores();
        // debuguear($errores);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // El constructor de la clase es un Arreglo y $_POST tambien por eso se puede pasar asi.
            $receta = new Receta($_POST['receta']);
            // debuguear($receta);
            // debuguear($_FILES['receta']);

            /**Subida de Archivos**/
            // Crear una carpeta
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            // Setear la imagen 
            // Realiza un resize a la imagen con Intervention Image.
            if ($_FILES['receta']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['receta']['tmp_name']['imagen'])->fit(800,600);
                $receta->setImagen($nombreImagen);
            }

            // debuguear($_SERVER["DOCUMENT_ROOT"]);

            // Validar 
            $errores = $receta->validar();
    
            // Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO (empty).
            if (empty($errores)) {
                // Crear la carpeta imagenes
                if(!is_dir(CARPETAS_IMAGENES)){
                    mkdir(CARPETAS_IMAGENES);
                }
    
                // Guarda la imagen en el servidor
                $image->save(CARPETAS_IMAGENES . $nombreImagen);
    
                // Guarda en la DB
               $receta->guardar();
            }
        }

        $router->render('/recetas/crear',[
            'errores' => $errores,
            'receta' => $receta
        ]);

    }

    public static function actualizar () {
        echo 'Actualizar propiedad';
    }

    public static function eliminar () {
        echo 'Eliminar propiedad';
    }




}