<?php


class imagenes
{
    private $id;
    private $id_producto;
    private $url_imagen;
    private $fecha_in;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }
    public function getUrl()
    {
        return $this->url_imagen;
    }
    public function getFechaIn()
    {
        return $this->fecha_in;
    }

    public function setid($id)
    {
        $this->id = $id;
    }

    public function setIdProducto($idProducto)
    {
        $this->id_producto = $idProducto;
    }
    public function setUrl($url)
    {
        $this->url_imagen = $url;
    }
    public function setFechaIn($date)
    {
        $this->fecha_in = $date;
    }
}
