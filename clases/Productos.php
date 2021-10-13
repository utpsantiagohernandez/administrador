<?php

namespace App;

class Productos{

    //Base de datos
    protected static $db;

    public $id;
    public $descripcion;
    public $precio;


    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    // Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public static function all(){
        $query ="SELECT * FROM productos";
        $resultado = self::consultar($query);
        return $resultado;
    }

    public static function consultar($query){
        //consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();
        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;
        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
}