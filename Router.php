<?php

    namespace MVC;

    class Router{

        public $rutasGET = [];
        public $rutasPOST = [];

        // Metodo que toma la urlactual y la funcion asociada.
        public function get($url, $fn){
            $this->rutasGET[$url] = $fn;
        }

        public function comprobarRutas() {

            // // Arreglo de rutas protegidas
            // $rutas_protegidas = ['/admin',
            //                     '/recetas',
            //                     '/receta/crear',
            //                     '/receta/actualizar',
            //                     '/receta/eliminar',
            //                     '/usuario/crear',
            //                     '/usuario/actualizar',
            //                     '/usuario/eliminar',
            //                     '/categoria/crear',
            //                     '/categoria/actualizar',
            //                     '/categoria/eliminar',
            //                     '/doc',
            //                     '/contacto'
            // ];

            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            // debuguear($urlActual);
            $metodo = $_SERVER['REQUEST_METHOD'];
            //  debuguear($metodo);

            if ($metodo === 'GET') {
                // debuguear($this->rutasGET);
                $fn = $this->rutasGET[$urlActual] ?? null;
                // debuguear($this->rutasGET[$urlActual]);
            }

            // // Proteger las rutas
            // if (in_array($urlActual, $rutas_protegidas)) {
            //     // debuguear($urlActual);
            //     header('Location: /');
            // }

            if($fn){
                // La url existe y hay una funcion asociada
                // debuguear($fn);
                // debuguear($this);
                call_user_func($fn, $this); // es una funcion que llama a otra funcion cuando no sabemos como se llama. P ejm. No se sabe a que url ira.
            } else {
                echo 'Pagina no encontrada';
            }
        }

        // Muestra la vista
        public function render($view){
            // echo 'desde Render'; 
            include __DIR__ . "/views/$view.php";
        }
    }