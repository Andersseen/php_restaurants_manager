<?php
class Restaurant
{

    public $id = 0;
    public $name = '';
    public $logo = '';

    public function __construct($id, $name, $logo)
    {

        $this->id = $id;
        $this->name = $name;
        $this->logo = $logo;
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
    public function get_logo()
    {
        return $this->logo;
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
    public function set_logo($logo)
    {
        $this->logo = $logo;
    }
}