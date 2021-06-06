<?php
function conectarDB() : mysqli {
    $db = new mysqli('192.168.2.3', 'root', 'root', 'recetario');
    if (!$db) {
        echo "Error no se pudo Conectar";
        exit;
    }
     return $db;
}