<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\RecetaController;
use Controllers\CategoriaController;
use Controllers\LoginController;

$router = new Router();

// debuguear(RecetaController::class);

$router->get('/admin',[RecetaController::class, 'index']);

$router->get('/recetas','recetas');

// Rutas Receta
$router->get('/receta/crear',[RecetaController::class, 'crear']);
$router->post('/receta/crear',[RecetaController::class, 'crear']);
$router->get('/receta/actualizar',[RecetaController::class, 'actualizar']);
$router->post('/receta/actualizar',[RecetaController::class, 'actualizar']);
$router->get('/receta/eliminar',[RecetaController::class, 'eliminar']);

// Rutas Usuario
$router->get('/usuario/crear', 'crear');
$router->get('/usuario/actualizar','recetas');
$router->get('/usuario/eliminar','recetas');

// Rutas Categoria
$router->get('/categoria/crear',[CategoriaController::class, 'crear']);
$router->post('/categoria/crear',[CategoriaController::class, 'crear']);
$router->get('/categoria/actualizar',[CategoriaController::class, 'actualizar']);
$router->post('/categoria/actualizar',[CategoriaController::class, 'actualizar']);
$router->get('/categoria/eliminar',[CategoriaController::class, 'eliminar']);

// Rutas Autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logon', [LoginController::class, 'logon']);
$router->post('/logon', [LoginController::class, 'logon']);



$router->get('/doc','doc');
$router->get('/contacto','contacto');

$router->comprobarRutas();