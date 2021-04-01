<?php

if (!file_exists(__DIR__ . '/config.php')) {
    die('ERROR: No existe el config.php');
}

session_start(); //inicio la sesión para poder hacer logout login

require 'config.php';

setlocale(LC_TIME, SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);


require('inc/class-restaurant.php');
require('inc/restaurants.php');


require('inc/helpers.php');
require('inc/class-db.php');


//conexión a la base de datos creandome un objeto de la clase Db
$app_db = new Db(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);

/*
PROBAR
*/

$server = 'localhost:3306';
$username = 'root';
$password = 'root';
$database = 'project';
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

//Logout
if (isset($_GET['logout'])) {
    logout();
}