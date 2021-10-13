<?php

namespace App;

class Clientes{

    //Base de datos
    protected static $db;

    public $id;
    public $nombre;
    public $direccion;
    public $colonia;
    public $ciudad;
    public $cp;


    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->cp = $args['cp'] ?? '';
    }

    // Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public static function all(){
        $query ="SELECT * FROM clientes where idclientes=1";
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