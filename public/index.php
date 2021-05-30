<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\RecetaController;
use Controllers\CategoriaController;

$router = new Router();

// debuguear(RecetaController::class);

$router->get('/admin',[RecetaController::class, 'index']);

$router->get('/recetas','recetas');

$router->get('/receta/crear',[RecetaController::class, 'crear']);
$router->post('/receta/crear',[RecetaController::class, 'crear']);
$router->get('/receta/actualizar',[RecetaController::class, 'actualizar']);
$router->post('/receta/actualizar',[RecetaController::class, 'actualizar']);
$router->get('/receta/eliminar',[RecetaController::class, 'eliminar']);

$router->get('/usuario/crear', 'crear');
$router->get('/usuario/actualizar','recetas');
$router->get('/usuario/eliminar','recetas');

$router->get('/categoria/crear',[CategoriaController::class, 'crear']);
$router->post('/categoria/crear',[CategoriaController::class, 'crear']);
$router->get('/categoria/actualizar',[CategoriaController::class, 'actualizar']);
$router->post('/categoria/actualizar',[CategoriaController::class, 'actualizar']);
$router->get('/categoria/eliminar',[CategoriaController::class, 'eliminar']);



$router->get('/doc','doc');
$router->get('/contacto','contacto');

$router->comprobarRutas();