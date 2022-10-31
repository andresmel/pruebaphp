<?php
require_once("../Daos/dao.php");
require_once("../Modelos/productos.php");

class insertProducto{


public static function insertar(){
    $producto=$_GET["producto"];
    $tipo=$_GET["tipo"];
    $name=$_FILES["files"]["name"];
    $url="../back/img/".$name;
    move_uploaded_file($_FILES["files"]["tmp_name"],"../img/".$name);
    $pr=new productos();
    $pr->setProducto($producto);
    $pr->setTipoProducto($tipo);
    $dao=new dao();
    echo $dao->insertarProducto($pr,$url);
}




}

insertProducto::insertar();