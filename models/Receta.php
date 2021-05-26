<?php 

namespace Model;

class Receta extends ActiveRecord{

    protected static $tabla='recetas';

    protected static $columnasDB =['id','titulo','imagen','ingredientes','descripcion'];

    public $id;
    public $titulo;
    public $imagen;
    public $ingredientes;
    public $descripcion;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->ingredientes = $args['ingredientes'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validar(){
        // Validar que no vaya vacio
        if (!$this->titulo) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->descripcion) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir una descripcion";
        }
        
        // if (!$this->imagen) {
        //     self::$errores[] = "Debes seleccionar una imagen para la propiedad";
        // }

        return self::$errores;
    }
    
}
