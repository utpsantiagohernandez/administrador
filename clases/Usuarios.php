<?php

namespace App;

class Usuarios{

    //Base de datos
    protected static $db;
    protected static $columnasDB = ['idusuarios', 'nombres','correo', 'contrasenia'];
    protected static $errores = [];

    public $idusuarios;
    public $nombres;
    public $correo;
    public $contrasenia;
 
    public function __construct($args = []){
        $this->idusuarios = $args['idusuarios'] ?? '';
        $this->nombres = $args['nombres'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->contrasenia = $args['contrasenia'] ?? '';
    }
     // Definir la conexión a la BD
     public static function setDB($database){
        self::$db = $database;
    }

    public function save(){

        if(!empty($this->idusuarios)){
            $this->update();
        }else{
            $this->create();
        }
    }

    public function create(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $query=" INSERT INTO usuarios( ";
        $query.= join(', ', array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.= join("', '", array_values($atributos));
        $query.=" ')";

        self::$db->query($query);
        
    }

    public function update(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] ="{$key}='{$value}'"; 
        }

        $query="UPDATE usuarios SET ";
        $query.= join(', ', $valores);
        $query.= " WHERE idusuarios ='".self::$db->escape_string($this->idusuarios). "' ";
        $query.=" LIMIT 1 "; 

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string(md5($value));
        }
        return $sanitizado;
    }


    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
           if($columna === 'idusuarios') continue;
           $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Lista todos los registros
    public static function all(){
        $query ="SELECT * FROM usuarios";
        $resultado = self::consultar($query);
        return $resultado;
    }

    //Busca un registro por su id
    public static function find($id){
        $query ="SELECT * FROM usuarios WHERE idusuarios = ${id}";
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

        if(!$this->nombres){
            self::$errores[] = "Debes añadir una nombre";
        }

        if(!$this->correo){
            self::$errores[] = "Debes añadir un correo electrónico";
        }

        return self::$errores;
    }

    
}