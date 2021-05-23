<?php 

namespace Model;

class Receta extends ActiveRecord{

    protected static $tabla='recetas';

    protected static $columnasDB =['id','titulo','imagen','ingredientes'];

    public $id;
    public $titulo;
    public $imagen;
    public $ingredientes;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->ingredientes = $args['ingredientes'] ?? '';
    }

    public function validar(){
        // Validar que no vaya vacio
        if (!$this->titulo) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un titulo";
        }
        
        // if (!$this->imagen) {
        //     self::$errores[] = "Debes seleccionar una imagen para la propiedad";
        // }

        return self::$errores;
    }
    
}
