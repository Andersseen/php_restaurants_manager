<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micro CMS</title>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/main.css">
</head>

<body>
    <nav id="site-navigation" class="row row-center" role="navigation">
        <div class="column">
            <h1>
                <a href="index.php">Sistema de restaurantes</a>
            </h1>
            <ul class="main-menu column clearfix">
                <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>

                <?php if (is_logged_in()) : ?>
                <li><a href="<?php echo SITE_URL; ?>/?logout=true">Logout</a></li>
                <li><a href="<?php echo SITE_URL; ?>/admin">Administración</a></li>
                <?php else : ?>
                <li><a href="<?php echo SITE_URL; ?>/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div id="content">