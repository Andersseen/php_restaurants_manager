<?php
//DEPURANDO ERRORES
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('SITE_URL', 'http://localhost:81/mi-proecto/proyecto'); //EN PRODUCCION SERIA OTRA URL
define('SITE_TIMEZONE', 'Europe/Madrid');
define('SITE_LANG', ['es', 'spa', 'es_ES']);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'project');
define('DB_PORT', '3306');

define('ADMIN_USER', 'andrey');
define('ADMIN_PASS', 'andreypass');