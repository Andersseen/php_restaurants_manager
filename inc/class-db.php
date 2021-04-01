<?php
class Db
{
    private $app_db = false;

    public function __construct($host, $user, $pass, $database, $port)
    {

        $this->app_db = mysqli_connect($host, $user, $pass, $database, $port);

        if (!$this->app_db) {
            die('Error al conectar con la base de datos');
        }
    }

    //método para hacer cualquier tipo de query
    public function query($query)
    {

        $result = mysqli_query($this->app_db, $query);

        if (!$result) {
            die($this->get_last_error());
        }

        return $result;
    }

    //método para sacar el último error en la bbdd en el caso de que lo haya habido
    public function get_last_error()
    {
        return mysqli_error($this->app_db);
    }

    //método para devolver todas las filas/registros de una tabla de mi bbdd en forma de arraya asociativos
    public function fetch_all($result)
    {

        $restaurants = [];
        while ($restaurant = $result->fetch_assoc()) {
            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }

    //otro método que ya usaba antes y que ahora tb lo meto en la clase para devolver UNA fila/registro de una tabla de mi bbdd en forma de arraya asociativo
    public function fetch_assoc($result)
    {
        return mysqli_fetch_assoc($result);
    }

    public function fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }

    //método que va a escapar los caracteres espciales de la bbdd
    public function real_escape_string($string)
    {
        return mysqli_real_escape_string($this->app_db, $string);
    }
}