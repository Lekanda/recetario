<?php 

namespace Model;

class Categoria extends ActiveRecord{

    protected static $tabla='categorias';

    protected static $columnasDB = ['id','nombre'];

    public $id;
    public $nombre;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


    public function validar(){
        // Validar que no vaya vacio
        if (!$this->nombre) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un Nombre de Categoria";
        }
        if (strlen($this->nombre) < 4) {
            self::$errores[] = "Nombre Categoria 4 letras minimo";
        }
        return self::$errores;

    }

}