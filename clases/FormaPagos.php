<?php

namespace App;

class FormasPago{

    //Base de datos
    protected static $db;
    protected static $columnasDB = ['idclientes', 'direccion','colonia', 'ciudad', 'estado', 'cp','estatus','usuarios_idusuarios'];
    protected static $errores = [];

    public $idclientes;
    public $direccion;
    public $colonia;
    public $ciudad;
    public $estado;
    public $cp;
    public $estatus;
    public $usuarios_idusuarios;

    public function __construct($args = []){
        $this->idclientes = $args['idclientes'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->cp = $args['cp'] ?? '';
        $this->estatus = $args['estatus'] ?? '';
        $this->usuarios_idusuarios = $args['usuarios_idusuarios'] ?? '';
    }

    // Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public function save(){

        if(!empty($this->idclientes)){
            $this->update();
        }else{
            $this->create();
        }
    }

    public function create(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $query=" INSERT INTO clientes( ";
        $query.= join(', ', array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.= join("', '", array_values($atributos));
        $query.=" ')";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function update(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] ="{$key}='{$value}'"; 
        }

        $query="UPDATE clientes SET ";
        $query.= join(', ', $valores);
        $query.= " WHERE idclientes ='".self::$db->escape_string($this->idclientes). "' ";
        $query.=" LIMIT 1 "; 

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }


    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
           if($columna === 'idclientes') continue;
           $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Lista todos los registros
    public static function all(){
        $query ="SELECT * FROM clientes";
        $resultado = self::consultar($query);
        return $resultado;
    }

    //Busca un registro por su id
    public static function find($id){
        $query ="SELECT * FROM clientes WHERE idclientes = ${id} and estatus=1";
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

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value ){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
   
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){

        if(!$this->direccion){
            self::$errores[] = "Debes añadir una dirección";
        }

        if(!$this->colonia){
            self::$errores[] = "Debes añadir una colonia";
        }

        if(!$this->ciudad){
            self::$errores[] = "Debes añadir una ciudad";
        }

        if(!$this->cp){
            self::$errores[] = "Debes añadir un código postal";
        }

        return self::$errores;
    }

}