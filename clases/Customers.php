<?php

namespace App;

class Customers{

    //Base de datos
    protected static $db;

    public $id;
    public $name;
    public $email;


    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->email = $args['email'] ?? '';
    }

    // Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public static function all(){
        $query ="SELECT * FROM customers";
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