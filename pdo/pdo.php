<?php

function connetion()
{
    $server = 'localhost:3306';
    $username = 'root';
    $password = 'root';
    $database = 'project';

    $db = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $db->query("set names utf8;");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $db;
}

function add_product_in_cart($idProduct)
{
    $db = connetion();
    $idSession = session_id();
    $sentencia = $db->prepare("INSERT INTO shopping_cart (id_session, id_product) VALUE (? , ?)");
    return $sentencia->execute([$idSession, $idProduct]);
}

function delete_product_in_cart($idProduct, $id)
{
    $db = connetion();
    $idSesion = session_id();
    $sentencia = $db->prepare("DELETE FROM shopping_cart WHERE id_session = ? AND id_product = ? AND num = ?");
    return $sentencia->execute([$idSesion, $idProduct, $id]);
}

function get_id_products_in_cart()
{
    $db = connetion();
    $sentencia = $db->prepare("SELECT shopping_cart.num FROM shopping_cart WHERE id_session = ?");
    $idSession = session_id();
    $sentencia->execute([$idSession]);
    return $sentencia->fetchAll();
}
function get_products_in_cart()
{
    $db = connetion();
    $sentencia = $db->prepare("SELECT products.id, products.name, products.price, products.id_restaurant, shopping_cart.num 
    FROM products, shopping_cart 
    WHERE products.id = shopping_cart.id_product");
    $sentencia->execute();
    return $sentencia->fetchAll();
}


function final_click($id_product, $id_restaurant, $id_user, $total)
{
    $db = connetion();

    $id_product = intval($id_product);
    $id_restaurant = intval($id_restaurant);
    $id_user = intval($id_user);
    $sentencia = $db->prepare("INSERT INTO orders (id_product, id_restaurant, id_user, total) VALUE (?, ?, ?, ?)");

    return $sentencia->execute([$id_product, $id_restaurant, $id_user, $total]);
}