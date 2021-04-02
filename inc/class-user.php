<?php
class User
{

    public $id = 0;
    public $name = '';
    public $surname = '';
    public $email = '';
    public $username = '';
    public $password = '';
    public $id_role = 2;

    public function __construct($id, $name, $surname, $email, $username, $password, $id_role)
    {

        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->id_role = $id_role;
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
    public function get_surname()
    {
        return $this->surname;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_username()
    {
        return $this->username;
    }
    public function get_password()
    {
        return $this->password;
    }
    public function get_id_role()
    {
        return $this->id_role;
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
    public function set_surname($surname)
    {
        $this->surname = $surname;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_username($username)
    {
        $this->username = $username;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }
    public function set_id_role($id_role)
    {
        $this->id_role = $id_role;
    }
}