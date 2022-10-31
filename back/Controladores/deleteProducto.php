<?php
require_once("../Daos/dao.php");

class deletePro{

   public function __construct()
   {
    
   }

   public static function deletePro(){
      $dao=new dao();
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      echo $data->id;
      $res=$dao->deletePro($data->id);
      echo $res;
   }



}

deletePro::deletePro();