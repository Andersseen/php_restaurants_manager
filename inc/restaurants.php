<?php

/**
 * Devuelve todo el listado de posts
 */
function get_all_restaurants()
{
    global $app_db;

    $result = $app_db->query('SELECT * FROM restaurants');

    $array_restaurants = $app_db->fetch_all($result);

    //convertir el array asociativo de los posts que he seleccionado de la bbdd a un array de objetos (cada objeto es un Post)
    $array_restaurants_obj = [];

    foreach ($array_restaurants as $restaurant) {

        $restaurant_obj = new Restaurant($restaurant['id'], $restaurant['name'], $restaurant['logo']);

        $array_restaurants_obj[] = $restaurant_obj;
    }
    //var_dump($array_posts_obj);

    return $array_restaurants_obj;
}

/**
 * Busca y devuelve un solo post
 * Si no lo encuentra, devuelve false
 */
function get_restaurant($restaurant_id)
{

    global $app_db;

    $restaurant_id = intval($restaurant_id);

    $query = 'SELECT * FROM restaurants WHERE id = ' . $restaurant_id;

    $result = $app_db->query($query);

    $restaurant_found = $app_db->fetch_assoc($result);

    //convierto la fila/post que he recogido de la tabla como array asociativo en un objeto y es lo que devuelvo ahora

    $restaurant_obj = new Restaurant($restaurant_found['id'], $restaurant_found['name'], $restaurant_found['logo']);

    return $restaurant_obj;
}

/*
*Insertar nuevo post
*
* @param $title
* @param $excerpt
* @param $content
*/
function insert_restaurant($name, $logo)
{


    global $app_db;

    $name = $app_db->real_escape_string($name);
    $logo = $app_db->real_escape_string($logo);

    $query = " INSERT INTO restaurants
    (name, logo)
    VALUES
    ( '$name' ,'$logo')";

    $result = $app_db->query($query);
}

/*
*Elimina un post
*
* @param $id
*/
function delete_restaurant($id)
{
    global $app_db;

    $id = intval($id);

    $result = $app_db->query("DELETE FROM restaurants WHERE id = $id");
}

function update_restaurant($name, $logo, $id_rest)
{


    global $app_db;
    $id_rest = intval($id_rest);

    $name = $app_db->real_escape_string($name);
    $logo = $app_db->real_escape_string($logo);

    $query = " UPDATE restaurants SET
    name = '$name' , logo = '$logo'
    where id =" . $id_rest;

    $result = $app_db->query($query);
}

function update_restaurant_without_img($name, $id_rest)
{


    global $app_db;
    $id_rest = intval($id_rest);

    $name = $app_db->real_escape_string($name);

    $query = " UPDATE restaurants SET
    name = '$name'
    where id =" . $id_rest;

    $result = $app_db->query($query);
}