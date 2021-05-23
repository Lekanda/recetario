<?php

namespace Controllers;
use MVC\Router;
use Model\Receta;

class RecetaController{
    public static function index () {
        echo "Index Controlador";
    }

    public static function crear (Router $router) {

        echo 'Crear propiedad';


        $receta = new Receta();
        debuguear($receta);

    }

    public static function actualizar () {
        echo 'Actualizar propiedad';
    }

    public static function eliminar () {
        echo 'Eliminar propiedad';
    }
}