<?php

namespace Model;

class Admin extends ActiveRecord{
    // Base de Datos. Asocia la tabla USUARIOS con el modelo Admin.php
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','apellidos','email','alias','creado','password'];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $alias;
    public $creado;
    public $password;

    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->alias = $args['alias'] ?? '';
        $this->creado = date('Y/m/d');
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        // Validar que no vaya vacio
        if (!$this->nombre) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un Nombre valido";
        }
        if (!$this->apellidos) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir unos Apellidos Validos";
        }
        if (!$this->email) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un Email valido";
        }
        if (!$this->alias) {
            // $errores[] => añade al arreglo $errores
            self::$errores[] = "Debes añadir un Alias valido";
        }
        if (!$this->password) {
            self::$errores[] = "Debes añadir un Password valido";
        }
        return self::$errores;
    }

    public function existeUsuario(){
        // Revisar sí un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        // debuguear($resultado);
        // Por num_rows sabemos si hay resultado de la consulta  a la DB

        if (!$resultado->num_rows) {
            self::$errores[] = 'El Usuario no existe';
            return;
        } 
        return $resultado;
    }


    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        // debuguear($usuario);

        // Funcion de PHP que nos comprueba sí el password esta correcto.
        $autenticado = password_verify($this->password, $usuario->password);
        // debuguear($autenticado);
        if (!$autenticado) {
            self::$errores[] = 'El Password es incorrecto';
        }
        return $autenticado;
    }


    public function autenticar(){
        // Iniciar sesion
        session_start();
        // Llenar el arreglo de sesion
        $_SESSION['usuario'] = $this->email; // Email
        $_SESSION['login'] = true; // Login OK

        header('Location: /admin');
    }
}