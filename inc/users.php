<?php

/**
 * Devuelve todo el listado de users
 */
function get_all_users()
{
    global $app_db;

    $result = $app_db->query('SELECT * FROM users');

    $array_users = $app_db->fetch_all($result);


    $array_users_obj = [];

    foreach ($array_users as $user) {

        $user_obj = new User($user['id'], $user['name'], $user['surname'], $user['email'], $user['username'], $user['password'], $user['id_role']);

        $array_users_obj[] = $user_obj;
    }

    return $array_users_obj;
}

/**
 * Busca y devuelve un solo post
 * Si no lo encuentra, devuelve false
 */
function get_user($user_id)
{

    global $app_db;

    $user_id = intval($user_id);

    $query = 'SELECT * FROM users WHERE id = ' . $user_id;

    $result = $app_db->query($query);

    $user_found = $app_db->fetch_assoc($result);

    //convierto la fila/post que he recogido de la tabla como array asociativo en un objeto y es lo que devuelvo ahora

    $user_obj = new User($user_found['id'], $user_found['name'], $user_found['surname'], $user_found['email'], $user_found['username'], $user_found['password'], $user_found['id_role']);

    return $user_obj;
}

/*
*Insertar nuevo post
*
* @param $title
* @param $excerpt
* @param $content
*/
function insert_user($name, $surname, $email, $username, $password, $id_role)
{


    global $app_db;

    $name = $app_db->real_escape_string($name);
    $surname = $app_db->real_escape_string($surname);
    $email = $app_db->real_escape_string($email);
    $username = $app_db->real_escape_string($username);
    $password = $app_db->real_escape_string($password);
    $id_role = $app_db->real_escape_string($id_role);

    $query = " INSERT INTO restaurants
    (name, surname, email, username, password, id_role)
    VALUES
    ( '$name' ,'$surname', '$email', '$username', '$password', '$id_role')";

    $result = $app_db->query($query);
}

/*
*Elimina un post
*
* @param $id
*/
function delete_user($id)
{
    global $app_db;

    $id = intval($id);

    $result = $app_db->query("DELETE FROM users WHERE id = $id");
}

function update_admin($id)
{
    global $app_db;

    $result = $app_db->query("UPDATE users SET id_role = '1' WHERE  id = $id");
}
function update_user($id)
{
    global $app_db;

    $result = $app_db->query("UPDATE users SET id_role = '2' WHERE  id = $id");
}