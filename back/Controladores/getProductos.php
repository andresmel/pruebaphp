<?php
require_once("../Daos/dao.php");

class getProductos{

   public function __construct()
   {
    
   }

   public static function getProductos(){
      $dao=new dao();
      $res=$dao->getProductos();
      echo json_encode($res);
   }



}

getProductos::getProductos();
