<?php

require '../init.php';



//Controlador frontal manejando el action
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'new-restaurant': {


            require 'templates/new-restaurant.php';
            break;
        }
    case 'list-restaurants': {


            if (isset($_GET['delete-restaurant'])) {
                $id = $_GET['delete-restaurant'];

                if (!check_hash('delete-restaurant-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                delete_restaurant($id);
                redirect_to('admin?action=list-restaurants&success-del=true');
            } elseif (isset($_GET['delete-product'])) {
                $id = $_GET['delete-product'];

                if (!check_hash('delete-product-' . $id, $_GET['hash'])) {
                    die('con que hackeando ehhh¿?¿?');
                }

                delete_product($id);
                redirect_to('admin?action=list-restaurants&success-del-prod=true');
            } elseif (isset($_GET['update-restaurant'])) {

                require 'templates/update-restaurant.php';
            } elseif (isset($_GET['add-products'])) {

                require 'templates/add-products.php';
            } elseif (isset($_GET['list-products'])) {
                $all_restaurants = get_all_restaurants();
                require 'templates/list-products.php';
            } elseif (isset($_GET['upd-product'])) {
                require 'templates/update-product.php';
            } else {
                $all_restaurants = get_all_restaurants();

                require 'templates/list-restaurants.php';
            }


            break;
        }
    case 'list-users': {



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


            require 'templates/new-admin.php';
            break;
        }
    default: {
            require 'templates/admin.php';
        }
}