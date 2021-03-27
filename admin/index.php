<?php

require '../init.php';

if (!is_logged_in()) {
    redirect_to('login.php');
}

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
                $logo = filter_input(INPUT_POST, 'logo', FILTER_SANITIZE_STRING);


                if (empty($name) || empty($logo)) {
                    $error = true;
                } else {
                    insert_restaurant($name, $logo);
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
    default: {
            require 'templates/admin.php';
        }
}