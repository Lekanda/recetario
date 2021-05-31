<?php

namespace Controllers;
use MVC\Router;
use Model\Categoria;


class CategoriaController{
    public static function crear (Router $router) {
        $categoria = new Categoria();

        $resultado = $_GET['resultado'] ?? null;
        // debuguear($_GET);

        // Arreglo con mensajes de errores
        $errores = Categoria::getErrores();
        // debuguear($errores);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // El constructor de la clase es un Arreglo y $_POST tambien por eso se puede pasar asi.
            $categoria = new Categoria($_POST['categoria']);
            // debuguear($categoria);
            
            // Validar 
            $errores = $categoria->validar();
            // debuguear($errores);
            
            // Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO (empty).
            if (empty($errores)) {
                // Guarda en la DB
               $categoria->guardar();
            }
        }

        $router->render('/categorias/crear',[
            'errores' => $errores,
            'resultado' => $resultado,
            'categoria' =>  $categoria

        ]);
    }

    public static function actualizar (Router $router) {
        $id = validarORedireccionar('/admin');

        $categoria = Categoria::find($id);
        // debuguear($categoria);

        $errores = Categoria::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['categoria'];
            $categoria->sincronizar($args);

            // Validacion
            $errores = $categoria->validar();

            if (empty($errores)) {
                $categoria->guardar();
            }
        }


        $router->render('/categorias/actualizar', [
            'categoria' => $categoria,
            'errores' => $errores
        ]);
    }
}