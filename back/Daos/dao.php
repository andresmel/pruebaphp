<?php

require_once("../DBcontext/conexion.php");
require_once("../Modelos/productos.php");
require_once("../Modelos/usuario.php");
require_once("../Modelos/imagenes.php");


class dao
{

    private $con;

    public function __construct()
    {
    }

    public function validarUsuario(usuarios $usuario)
    {
        try {
            $this->con = conection::connect();
            $user = $usuario->getUsuario();
            $pass = $usuario->getPassword();
            $sql = "select * from usuarios where usuario='$user' and password ='$pass'";
            $val = mysqli_query($this->con, $sql);

            if (mysqli_num_rows($val) > 0) {
                mysqli_close($this->con);
                return true;
            } else {
                mysqli_close($this->con);
                return false;
            }
        } catch (Exception $er) {
            return $er;
        }
    }


    public function insertarProducto(productos $pr, $url)
    {
        try {
            $id = 0;
            $this->con = conection::connect();
            $producto = $pr->getProducto();
            $tipo = $pr->getTipoProducto();
            $sql = "insert into productos(producto,tipo_producto)values('$producto',$tipo)";
            $query = mysqli_query($this->con, $sql);
            if ($query) {
                $sqlDos = "select id from productos order by id desc limit 1";
                $queryDos = mysqli_query($this->con, $sqlDos);
                if (mysqli_num_rows($queryDos) > 0) {
                    while ($file = mysqli_fetch_array($queryDos)) {
                        $id = $file["id"];
                    }
                    $sqlTres = "insert into imagenes_productos(id_producto,url_imagen)values($id,'$url')";
                    $queryTres = mysqli_query($this->con, $sqlTres);
                    if ($queryTres) {
                        mysqli_close($this->con);
                        return true;
                    } else {
                        mysqli_close($this->con);
                        return false;
                    }
                }


                mysqli_close($this->con);
                return true;
            } else {
                mysqli_close($this->con);
                return false;
            }
        } catch (Exception $er) {
            return $er;
        }
    }


    public function updateProducto(productos $pr, $url)
    {
        try {
           
            $this->con = conection::connect();
            $producto = $pr->getProducto();
            $tipo = $pr->getTipoProducto();
            $id = $pr->getId();
            $sql = "update productos set producto = '$producto',tipo_producto='$tipo' where id = $id";
            $query = mysqli_query($this->con, $sql);
            if ($query) {
                $sql = "update imagenes_productos set url_imagen = '$url' where id_producto = $id";
                $query = mysqli_query($this->con, $sql);
                if($query){
                mysqli_close($this->con);
                return true;
                }else{
                mysqli_close($this->con);
                return false; 
                }
            } else {
                mysqli_close($this->con);
                return false;
            }
        } catch (Exception $er) {
            return $er;
        }
    }


    public function getProductos()
    {
        try {
            $productos = [];
            $this->con = conection::connect();
            $sql = "select a.*,b.tipo_producto,c.url_imagen from productos as a inner join tipos_productos as b on a.tipo_producto = b.id inner join imagenes_productos as c on a.id = c.id_producto";
            $query = mysqli_query($this->con, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($file = mysqli_fetch_array($query)) {
                    $dto = new stdClass();
                    $dto->id = $file['id'];
                    $dto->idCategoria = $file['producto'];
                    $dto->name = $file['tipo_producto'];
                    $dto->date = $file['fecha_in'];
                    $dto->img = $file['url_imagen'];
                    $productos[] = $dto;
                }
                return $productos;
                mysqli_close($this->con);
            } else {
                mysqli_close($this->con);
                return $productos;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function deletePro($id)
    {
        $this->con = conection::connect();
        $sql = "delete from productos where id = $id";
        $query = mysqli_query($this->con, $sql);
        if ($query) {
            mysqli_close($this->con);
            return true;
        } else {
            mysqli_close($this->con);
            return false;
        }
    }


    public function insertarImagenProducto(imagenes $imagen)
    {
        try {
            $this->con = conection::connect();
            $id_producto = $imagen->getIdProducto();
            $url = $imagen->getUrl();
            $sql = "insert into imagenes_productos(id_producto,url_imagen)values($id_producto,'$url')";
            $query = mysqli_query($this->con, $sql);
            if ($query) {
                mysqli_close($this->con);
                return true;
            } else {
                mysqli_close($this->con);
                return false;
            }
        } catch (Exception $er) {
            return $er;
        }
    }
}
