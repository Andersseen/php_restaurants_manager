<?php
class Product
{

    public $id = 0;
    public $name = '';
    public $price = '';

    public function __construct($id, $name, $price)
    {

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }


    //MÉTODOS GET PARA DEVOLVER LOS VALORES DE LAS PROPIEDADES
    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_price()
    {
        return $this->price;
    }


    //MÉTODOS SET PARA MODIFICAR LOS VALORES DE LAS PROPIEDADES
    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_name($name)
    {
        $this->name = $name;
    }
    public function set_price($price)
    {
        $this->price = $price;
    }
}