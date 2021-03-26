<?php
/*
*Redirige a una URL
*
*@param $path
*/
function redirect_to($path)
{
    header('Location:' . SITE_URL . '/' . $path);
    die();
}
/**
 * Genera un cadena alfanumerica
 * 
 * @param action
 * 
 * @return string
 */
function generate_hash($action)
{
    return md5($action);
}

/**
 * Comprueba su una secuencia alfanumérica es correcta
 * 
 * @param action
 * @param hash
 * 
 * @return bool
 */
function check_hash($action, $hash)
{
    if (generate_hash($action) == $hash) {
        return true;
    }
    return false;
}
//FUNCIONES PARA LOGIN
/**
 * is_logged_in()
 * Comprueba si el usuario administrador ha hecho login.
 * @return bool
 */
function is_logged_in()
{
    $is_user_logged_in = isset($_SESSION['user']) && $_SESSION['user'] === ADMIN_USER;
    return $is_user_logged_in;
}

/**
 * login()
 * Parte del login donde validamos el formulario
 * 
 * @param $username
 * @param $password
 * 
 * @return bool
 */
function login($username, $password)
{
    if ($username === ADMIN_USER && $password === ADMIN_PASS) {

        $_SESSION['user'] = ADMIN_USER;
        return true;
    }
    return false;
}

/**
 * logout()
 */
function logout()
{
    unset($_SESSION['user']);
    redirect_to('index.php');
    session_destroy(); //destruyo la sesión una vez que he deslogueado al usuario
}