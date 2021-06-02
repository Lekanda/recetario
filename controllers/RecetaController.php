<?php

namespace Controllers;
use MVC\Router;
use Model\Receta;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;


class RecetaController{
    public static function index (Router $router) {
        // debuguear($router);
        $recetas = Receta::all();
        $categorias = Categoria::all();

        // Muestra mensaje condicional, si no hay lo pone como null
        $resultado = $_GET['resultado'] ?? null;
        // debuguear($_GET);
        // debuguear($resultado);
        // debuguear($recetas);

        $router->render('/recetas/admin',[
            'categorias' => $categorias,
            'recetas' => $recetas,
            'resultado' => $resultado
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
                // debuguear($receta);
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
            }
            // Guarda la imagen en el servidor
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
    
            // Guarda en la DB
           $receta->guardar();
        }

        $router->render('/recetas/crear',[
            'errores' => $errores,
            'receta' => $receta
        ]);
    }





    public static function actualizar (Router $router) {
        $id = validarORedireccionar('/admin');

        $receta = Receta::find($id);

        $errores = Receta::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            // Asignar los atributos
            $args = $_POST['receta'];
            $receta->sincronizar($args);
            // debuguear($args);
            
            // Validacion
            $errores = $receta->validar();
            

            // Subida de archivos(Imagen). Realiza un resize a la imagen con Intervention Image.
            // Generar un nombre unico
            // debuguear($_FILES['receta']['tmp_name']['imagen']);
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['receta']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['receta']['tmp_name']['imagen'])->fit(800,600);
                // debuguear($_FILES['receta']['tmp_name']['imagen']);
                // debuguear($image);
                $receta->setImagen($nombreImagen);
            } 
            // debuguear($_SERVER["DOCUMENT_ROOT"]);
            // Validar 
            // $errores = $receta->validar();
            
            //Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO.
            if (empty($errores)) {
                // Almacenar la imagen
                if ($_FILES['receta']['tmp_name']['imagen']){
                    $image->save(CARPETAS_IMAGENES . $nombreImagen);
                }
                
                $receta->guardar();
            }
        }
            
        $router->render('/recetas/actualizar', [
            'receta' => $receta,
            'errores' => $errores
        ]);

    }

    public static function eliminar () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ID
            $id = $_POST['id'];
            // debuguear($id);
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
                // debuguear($tipo);
                if (validarTipoContenido($tipo)) {
                    $propiedad = Receta::find($id);
                    // debuguear($propiedad);
                    $propiedad->eliminar();
                }
            }
        }
    }

}