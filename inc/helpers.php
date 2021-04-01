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
    global $conn;
    if (!empty(isset($_SESSION['user_id']))) {
        $records = $conn->prepare('SELECT id, username, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $results;
            $is_user_logged_in = $results;
            return $is_user_logged_in;
        }
    }
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
    // if (!empty($username) && !empty($password)) {
    //     if ($username === ADMIN_USER && $password === ADMIN_PASS) {

    //         $_SESSION['user'] = ADMIN_USER;
    //         return true;
    //     }

    global $conn;
    $records = $conn->prepare('SELECT id, username, password FROM users WHERE username = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && $results['password']) {
        $_SESSION['user_id'] = $results['id'];
        redirect_to("index.php");
    } else {
        $message = 'Sorry, those credentials do not match';
    }
}


/**
 * create_user()
 * Parte del login donde validamos el formulario
 * 
 * @param $username
 * @param $password
 * 
 * 
 */


function create_user($name, $surname, $email, $username, $password, $role)
{
    global $app_db;

    $name = $app_db->real_escape_string($name);
    $surname = $app_db->real_escape_string($surname);
    $email = $app_db->real_escape_string($email);
    $username = $app_db->real_escape_string($username);
    $password = $app_db->real_escape_string($password);
    $password = hash('sha512', $password);
    $role = 2;

    $query = " INSERT INTO users
    (name, surname, email, username, password, id_role )
    VALUES
    ( '$name' ,'$surname', '$email', '$username', '$password', $role)";

    $verification_username = $app_db->query("SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($verification_username) > 0) {
        redirect_to('signup.php?error=true');
    } else {
        $result = $app_db->query($query);
        redirect_to('index.php?success=true');
    }
}


/**
 * logout()
 */
function logout()
{
    unset($_SESSION['user_id']);
    unset($_SESSION['user']);
    redirect_to('index.php');
    session_destroy(); //destruyo la sesión una vez que he deslogueado al usuario
}
