<?php 

namespace Model;

class Receta extends ActiveRecord{

    protected static $tabla='recetas';

    protected static $columnasDB =['id','titulo','imagen','ingredientes','descripcion','creado','usuarioId'];

    public $id;
    public $titulo;
    public $imagen;
    public $ingredientes;
    public $descripcion;
    public $creado;
    public $usuarioId;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->ingredientes = $args['ingredientes'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        $this->usuarioId = $args['usuarioId'] ?? '';
    }

    public function validar(){
        // Validar que no vaya vacio
        if (!$this->titulo) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un titulo";
        }
        if (strlen($this->titulo) < 4) {
            self::$errores[] = "Titulo 4 letras minimo";
        }
        if (!$this->ingredientes) {
            self::$errores[] = "Debes añadir ingredientes";
        }
        if (strlen($this->ingredientes) < 10) {
            self::$errores[] = "Ingredientes 10 letras minimo";
        }
        if (!$this->descripcion) {
            self::$errores[] = "Debes añadir una descripcion";
        }
        if (strlen($this->descripcion) < 10) {
            self::$errores[] = "Descripcion 10 letras minimo";
        }

        return self::$errores;
    }
}
