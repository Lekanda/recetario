<?php

namespace Controllers;
use MVC\Router;
use Model\Receta;

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
        debuguear($receta);

    }

    public static function actualizar () {
        echo 'Actualizar propiedad';
    }

    public static function eliminar () {
        echo 'Eliminar propiedad';
    }




}