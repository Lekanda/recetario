<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){

        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $auth = new Admin($_POST);
            
            $errores = $auth->validar();
            // debuguear($errores);

            if (empty($errores)) {
                // Verificar sí el usuario existe
                $resultado = $auth->existeUsuario();
                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el Password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        // Autenticar al usuario
                        $auth->autenticar();
                    } else {
                        // Password Incorrecto(Mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }




    public static function logon(Router $router){

        $usuario = new Admin($_POST);

        $resultado = $_GET['resultado'] ?? null;
        
        // Arreglo con mensajes de errores
        $errores = Admin::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST['logon']);
            $usuario = new Admin($_POST['logon']);
            // debuguear($usuario);
            
            // Validar 
            $errores = $usuario->validar();
            // debuguear($errores);
            
            if (empty($errores)) {
                $usuario->guardar();
            }
        }
        $router->render('auth/logon',[
            'errores' => $errores
        ]);
    }
    





    public static function logout(Router $router){
        session_start();
        // debuguear($_SESSION);
        
        $_SESSION = [];
        // debuguear($_SESSION);

        header('Location: /');

    }

}