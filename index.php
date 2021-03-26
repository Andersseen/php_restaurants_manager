<?php

//DEPURANDO ERRORES
error_reporting(E_ALL);
ini_set('display_errors', 1);

//fechas a español
//setlocale( LC_ALL );
setlocale(LC_TIME, 'es', 'spa', 'es_ES');
date_default_timezone_set('Europe/Madrid');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="./assets/main.css">
</head>

<body>
    <nav id="site-navigation" class="row row-center" role="navigation">
        <div class="column">
            <h1>
                <a href="index.php">Proyecto</a>
            </h1>
            <ul class="main-menu column clearfix">
            </ul>
        </div>
    </nav>
    <div id="content">

    </div>
    <footer id="footer">
        <div id="inner-footer">
            &copy; Mi proyecto en PHP
        </div>
    </footer>
</body>

</html>