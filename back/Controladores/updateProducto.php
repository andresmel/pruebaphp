<?php
require_once("../Daos/dao.php");
require_once("../Modelos/productos.php");

class updateProducto{


public static function update(){
    $producto=$_GET["producto"];
    $tipo=$_GET["tipo"];
    $id=$_GET["id"];
    $name=$_FILES["files"]["name"];
    $url="../back/img/".$name;
    move_uploaded_file($_FILES["files"]["tmp_name"],"../img/".$name);
    $pr=new productos();
    $pr->setId($id);
    $pr->setProducto($producto);
    $pr->setTipoProducto($tipo);
    $dao=new dao();
    $res=$dao->updateProducto($pr,$url);
    return json_encode(["res"=>$res]);
}




}

updateProducto::update();