<?php
class Product
{

    public $id = 0;
    public $name = '';
    public $price = '';
    public $id_restaurant = 0;

    public function __construct($id, $name, $price, $id_restaurant)
    {

        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->id_restaurant = $id_restaurant;
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
    public function get_id_restaurant()
    {
        return $this->id_restaurant;
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
    public function set_id_restaurant($id_restaurant)
    {
        $this->price = $id_restaurant;
    }
}