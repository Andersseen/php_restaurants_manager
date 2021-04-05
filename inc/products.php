<?php

/**
 * Devuelve todo el listado de posts
 */
function get_all_products()
{
    global $app_db;

    $result = $app_db->query('SELECT * FROM products');

    $array_products = $app_db->fetch_all($result);

    //convertir el array asociativo de los posts que he seleccionado de la bbdd a un array de objetos (cada objeto es un Post)
    $array_products_obj = [];

    foreach ($array_products as $product) {

        $product_obj = new Product($product['id'], $product['name'], $product['price'], $product['id_restaurant']);

        $array_products_obj[] = $product_obj;
    }
    //var_dump($array_posts_obj);

    return $array_products_obj;
}
function get_all_products_for($product_id)
{
    global $app_db;

    $product_id = intval($product_id);

    $query = 'SELECT * FROM products WHERE id_restaurant = ' . $product_id;

    $result = $app_db->query($query);
    $array_products_obj = [];
    // $product_found = $app_db->fetch_assoc($result);
    while ($product_found = $app_db->fetch_assoc($result)) {
        $product_found = new Product($product_found['id'], $product_found['name'], $product_found['price'], $product_found['id_restaurant']);
        $array_products_obj[] = $product_found;
    }


    //convierto la fila/que he recogido de la tabla como array asociativo en un objeto y es lo que devuelvo ahora



    return $array_products_obj;
}

/**
 * Busca y devuelve un solo post
 * Si no lo encuentra, devuelve false
 */
function get_product($product_id)
{

    global $app_db;

    $product_id = intval($product_id);

    $query = 'SELECT * FROM products WHERE id = ' . $product_id;

    $result = $app_db->query($query);

    $product_found = $app_db->fetch_assoc($result);


    //convierto la fila/que he recogido de la tabla como array asociativo en un objeto y es lo que devuelvo ahora

    $product_obj = new Product($product_found['id'], $product_found['name'], $product_found['price'], $product_found['id_restaurant']);

    return $product_obj;
}
function get_product_for($product_id)
{

    global $app_db;

    $product_id = intval($product_id);

    $query = 'SELECT * FROM products WHERE id_restaurant = ' . $product_id;

    $result = $app_db->query($query);

    $product_found = $app_db->fetch_assoc($result);


    //convierto la fila/que he recogido de la tabla como array asociativo en un objeto y es lo que devuelvo ahora

    $product_obj = new Product($product_found['id'], $product_found['name'], $product_found['price'], $product_found['id_restaurant']);

    return $product_obj;
}

/*
*Insertar nuevo post
*
* @param $title
* @param $excerpt
* @param $content
*/
function insert_product($name, $price, $id_restaurant)
{


    global $app_db;

    $name = $app_db->real_escape_string($name);
    $price = $app_db->real_escape_string($price);
    $id_restaurant = $app_db->real_escape_string($id_restaurant);


    $query = " INSERT INTO products
    (name, price, id_restaurant)
    VALUES
    ( '$name' ,'$price', '$id_restaurant')";

    $result = $app_db->query($query);
}

/*
*Elimina un post
*
* @param $id
*/
function delete_product($id)
{
    global $app_db;

    $id = intval($id);

    $result = $app_db->query("DELETE FROM products WHERE id = $id");
}


function update_product($name, $price, $id)
{


    global $app_db;
    $id = intval($id);

    $name = $app_db->real_escape_string($name);
    $price = $app_db->real_escape_string($price);

    $query = " UPDATE products SET
    name = '$name' , price = '$price'
    where id =" . $id;

    $result = $app_db->query($query);
}