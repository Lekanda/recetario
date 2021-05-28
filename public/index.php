<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\RecetaController;

$router = new Router();

// debuguear(RecetaController::class);

$router->get('/admin',[RecetaController::class, 'index']);

$router->get('/recetas','recetas');
$router->get('/receta/crear',[RecetaController::class, 'crear']);
$router->post('/receta/crear',[RecetaController::class, 'crear']);
$router->get('/receta/actualizar',[RecetaController::class, 'actualizar']);
$router->get('/receta/eliminar',[RecetaController::class, 'eliminar']);

$router->get('/usuario/crear','recetas');
$router->get('/usuario/actualizar','recetas');
$router->get('/usuario/eliminar','recetas');

$router->get('/categoria/crear','recetas');
$router->get('/categoria/actualizar','recetas');
$router->get('/categoria/eliminar','recetas');



$router->get('/doc','doc');
$router->get('/contacto','contacto');

$router->comprobarRutas();