<!DOCTYPE html>
<html lang="es">

<!-- <head> -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de gestion de los restaurantes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/style.css">
<script src="https://kit.fontawesome.com/8f4fce04f5.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container container-fluid d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0"><a href="<?php echo SITE_URL; ?>/index.php">Sistema de restaurantes</h3>
                <nav class="nav nav-masthead justify-content-center float-md-center">
                    <?php if (empty($user_ses)) : ?>
                    <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link" aria-current="page">Home</a>
                    <a href="<?php echo SITE_URL; ?>/login.php" class="nav-link">Login</a>
                    <a href="<?php echo SITE_URL; ?>/signup.php" class="nav-link">SignUp</a>
                    <?php else : ?>
                    <?php if ($user_ses['id_role'] == '1') : ?>
                    <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link ">Home</a>
                    <a href="<?php echo SITE_URL; ?>/?logout=true" class="nav-link ">Logout</a>
                    <a href="<?php echo SITE_URL; ?>/admin" class="nav-link ">Administración</a>


                    <?php else : ?>
                    <a href="<?php echo SITE_URL; ?>/index.php" class="nav-link 3">Home</a>
                    <a href="<?php echo SITE_URL; ?>/?logout=true" class="nav-link ">Logout</a>

                    </a>
                    <?php endif; ?>
                    <?php endif; ?>
                </nav>

            </div>
        </header>

        <main class="px-3 mt-5">
            <div id="content">