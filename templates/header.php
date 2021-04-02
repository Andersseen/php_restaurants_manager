<!DOCTYPE html>
<html lang="en">

<!-- <head> -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de gestion de los restaurantes</title>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/global.css">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/main.css">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/style.css">
</head>

<body>
    <header>
        <nav id="site-navigation" class="row row-center" role="navigation">
            <div class="column">
                <h1>
                    <a href="index.php">Sistema de restaurantes</a>
                </h1>
                <ul class="main-menu column clearfix">
                    <?php if (empty($user_ses)) : ?>
                    <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/login.php">Login</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/signup.php">SignUp</a></li>
                    <?php else : ?>
                    <?php if ($user_ses['id_role'] == '1') : ?>
                    <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/?logout=true">Logout</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/admin">Administración</a></li>

                    <?php else : ?>
                    <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/?logout=true">Logout</a></li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="content">