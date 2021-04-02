<?php

require '../init.php';

// if (!is_logged_in()) {
//     redirect_to('login.php');
// }

//Controlador frontal manejando el action
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'new-restaurant': {
            //formulario de new post
            //procesando el formulario
            $error = false;
            $name = '';
            $logo = '';


            if (isset($_POST['submit-new-restaurant'])) {
                //se ha enviado el formulario


                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                // $logo = filter_input(INPUT_POST, 'logo', FILTER_SANITIZE_STRING);
                $logo = $_FILES['logo']['tmp_name'];
                $logo_name = $_FILES['logo']['name'];
                //ruta de la imagen para guardar la ruta en la bbdd
                $imgContent = addslashes(file_get_contents($logo));
                $dir_download = $_SERVER['DOCUMENT_ROOT'] . '/mi-proecto/proyecto/assets/logos/';
                $logo_db = './assets/logos/' . $logo_name;






                if (empty($name) || empty($logo)) {
                    $error = true;
                } else {
                    //guardo
                    sleep(2);
                    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                    move_uploaded_file($logo, $dir_download . $logo_name);
                    insert_restaurant($name, $logo_db);
                    //redirect_to( 'index.php?success=true' );
                    redirect_to('admin?action=list-restaurants&success=true');
                }
            }
            require 'templates/new-restaurant.php';
            break;
        }
    case 'list-restaurants': {
            //listado de restaurants

            //borrar restaurant de la base de datos
            if (isset($_GET['delete-restaurant'])) {
                $id = $_GET['delete-restaurant'];

                if (!check_hash('delete-restaurant-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                delete_restaurant($id);
                redirect_to('admin?action=list-restaurants&success-del=true');
            }

            $all_restaurants = get_all_restaurants();

            require 'templates/list-restaurants.php';
            break;
        }
    case 'list-users': {


            //borrar user de la base de datos
            if (isset($_GET['delete-user'])) {
                $id = $_GET['delete-user'];

                if (!check_hash('delete-user-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                delete_user($id);
                redirect_to('admin?action=list-users&success-del=true');
            }
            if (isset($_GET['update-admin'])) {
                $id = $_GET['update-admin'];

                if (!check_hash('update-admin-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                update_admin($id);
                redirect_to('admin?action=list-users&success-upd=true');
            }
            if (isset($_GET['update-user'])) {
                $id = $_GET['update-user'];

                if (!check_hash('update-user-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                update_user($id);
                redirect_to('admin?action=list-users&success-upd=true');
            }

            $all_users = get_all_users();

            require 'templates/list-users.php';
            break;
        }
    case 'new-admin': {
            //formulario de new post
            //procesando el formulario
            $error = false;

            $name = '';
            $surname = '';
            $email = '';
            $username = '';
            $password = '';
            $id_role = 1;


            if (isset($_POST['submit-new-admin'])) {
                //se ha enviado el formulario


                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $id_role = 1;

                if (empty($name) || empty($surname) || empty($email) || empty($username)) {
                    $error = true;
                } else {
                    //guardo
                    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente

                    insert_user($name, $surname, $email, $username, $password, $id_role);
                    //redirect_to( 'index.php?success=true' );
                    redirect_to('admin?action=list-users&success=true');
                }
            }
            require 'templates/new-admin.php';
            break;
        }
    default: {
            require 'templates/admin.php';
        }
}