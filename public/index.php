<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\RecetaController;

$router = new Router();

// debuguear(RecetaController::class);

$router->get('/admin',[RecetaController::class, 'index']);

$router->get('/recetas','recetas');
$router->get('/recetas/crear','recetas');
$router->get('/recetas/actualizar','recetas');
$router->get('/recetas/eliminar','recetas');

$router->get('/usuarios/crear','recetas');
$router->get('/usuarios/actualizar','recetas');
$router->get('/usuarios/eliminar','recetas');

$router->get('/categorias/crear','recetas');
$router->get('/categorias/actualizar','recetas');
$router->get('/categorias/eliminar','recetas');



$router->get('/doc','doc');
$router->get('/contacto','contacto');

$router->comprobarRutas();