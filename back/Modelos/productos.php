<?php

class productos{
    private $id;
    private $producto;
    private $tipo_producto;
    private $fecha_in;

   public function __construct(){

   }
  
   public function getProducto(){
    return $this->producto;
   }

   public function getId(){
    return $this->id;
   }

   public function getTipoProducto(){
    return $this->tipo_producto;
   }
   public function getDate(){
    return $this->fecha_in;
   }

   public function setProducto($producto){
      $this->producto=$producto;
   }

   public function setId($id){
    $this->id=$id;
   }
    public function setTipoProducto($tipo){
    $this->tipo_producto=$tipo;
    }

    public function setDate($date){
    $this->fecha_in=$date;
    }


}


?>