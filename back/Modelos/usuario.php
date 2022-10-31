<?php

class usuarios{
    private $id;
    private $usuario;
    private $password;
    private $fecha_in;

   public function __construct(){

   }
  
   public function getId(){
    return $this->id;
   }

   public function getUsuario(){
    return $this->usuario;
   }

   public function getPassword(){
    return $this->password;
   }
   public function getFechaIn(){
    return $this->fecha_in;
   }

   public function setid($id){
      $this->id=$id;
   }

   public function setUsuario($usuario){
    $this->usuario=$usuario;
   }
    public function setPassword($password){
    $this->password=$password;
    }

    public function setFechaIn($date){
    $this->fecha_in=$date;
    }
 


}


?>