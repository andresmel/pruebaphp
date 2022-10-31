<?php

require_once("../Daos/dao.php");
require_once("../Modelos/usuario.php");


class autenticar
{
    public static function auth()
    {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $user=$data->usuario;
      $pass=$data->pass;
      $us=new usuarios();
      $us->setUsuario($user);
      $us->setPassword($pass);
      $dao=new dao();
      $res=$dao->validarUsuario($us);
      echo json_encode(["Res"=>$res]);
    }
}

autenticar::auth();