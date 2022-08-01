<?php

namespace App;




class Medico{

    protected static $db;
    protected static $columnasDB=['id','nombre','apellido','especialidad','imagen'];
    protected static $errores=[];

    public $id;
    public $nombre;
    public $apellido;
    public $especialidad;
    public $imagen;

    function __construct($args=[]){
        $this->id=$args['id']??'';
        $this->nombre=$args['nombre']??'';
        $this->apellido=$args['apellido']??'';
        $this->especialidad=$args['especialidad']??'';
        $this->imagen=$args['imagen']??'';
    }

    public static function setDB($database){
        self::$db=$database;
    }

    
    public function guardar(){
        if($this->id){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public function actualizar(){
        $atributos=$this->sanitizarAtributos();

        $valores=[];

        foreach($atributos as $key =>$value){
            $valores[]="{$key}='{$value}'";
        }

        $query="UPDATE medicos SET ";
        $query.=join(',',$valores);
        $query.=" WHERE id='".self::$db->escape_string($this->id)."'";

        $resultado=self::$db->query($query);

        if($resultado){
            header('Location:/medicos.php?resultado=2'); 
        }
    }

    public function sincronizar($args=[]){
        foreach($args as $key =>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key=$value;
            }
        }
    }


    public function crear(){
       

        $atributos=$this->sanitizarAtributos();


        $query="INSERT INTO medicos (";
        $query.=join(',',array_keys($atributos));
        $query.=") VALUES (' ";
        $query.= join("','",array_values($atributos));
        $query.="')";

       $resultado= self::$db->query($query);

       if($resultado){
        header('Location:/medicos.php?resultado=1'); 
        }


    }

    public function atributos(){
        $atributos=[];
        foreach(self::$columnasDB as $columna){
            if($columna==='id') continue;
            $atributos[$columna]=$this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos=$this->atributos();
        $sanitizado=[];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key]=self::$db->escape_string($value);
        }

        return $sanitizado;


    }

    public static function getErrores(){
        return self::$errores;
    }

    
    public function validar(){
        
        if(!$this->nombre){
            self::$errores[]="El nombre es obligatorio";
        }

        if(!$this->apellido){
            self::$errores[]="El apellido es obligatorio";
        }

        if(!$this->imagen){
            self::$errores[]="La imagen es obligatoria";
        }

        if(!$this->especialidad){
            self::$errores[]="Debe ingresar una especialidad";
        }else{

            $tipos=['cirujano','neurología','optamólogía','dermatología'];
        
            if(!in_array($this->especialidad,$tipos)){
                self::$errores[]="La especialidad ingresada no es válida";
            }
    
        }


        return self::$errores;


    }

    public function setImagen($imagen){

        if($this->id){
            
            $existeArchivo=file_exists('imagenes/'.$this->imagen);
            if($existeArchivo){
               unlink('imagenes/'.$this->imagen);
           }
           
        }

        
        if($imagen){
            $this->imagen=$imagen;
        }
    }


    public static function all(){
        $query="SELECT * FROM medicos"; 

      $resultado= self::consultarSQL($query);
    
      return $resultado;

    }



    public static function find($id){
        $query="SELECT *FROM medicos where id=${id}";
        $resultado=self::consultarSQL($query);
        
        
        return array_shift($resultado);
    }

    public static function consultarSQL($query){

        $resultado=self::$db->query($query);

        if($resultado->num_rows===0){
            header('Location:/');
         }
        

        $array=[];

        while($registro=$resultado->fetch_assoc()){
            $array[]=self::crearObjeto($registro);
        }
        
        

      
        $resultado->free();

      
        return $array;

    }

    
    protected static function crearObjeto($registro){
        $objeto= new self; 
      
        foreach($registro as $key=>$value){
            if(property_exists($objeto,$key)){
                $objeto->$key=$value;
            }
        }


        return $objeto;

    }

    
    public function eliminar(){
        $query="DELETE FROM medicos WHERE id=".self::$db->escape_string($this->id);

        $resultado=self::$db->query($query);

        $this->borrarImagen();

       if($resultado){
         header('Location:/medicos.php');
        }
    }

    public function borrarImagen(){
        $existeArchivo=file_exists('imagenes/'.$this->imagen);
      
        if($existeArchivo){
           unlink('imagenes/'.$this->imagen);
       }
    }


    

    



}
