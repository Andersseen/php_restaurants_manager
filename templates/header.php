<?php

if (isset($_SESSION['user_id'])) {
    // $records_admin = $conn->prepare('SELECT id, username, is_admin FROM users WHERE id = :id AND is_admin = 1');
    // $records_admin->bindParam(':id', $_SESSION['user_id']);
    // $records_admin->execute();
    // $results_admin = $records_admin->fetch(PDO::FETCH_ASSOC);


    $records = $conn->prepare('SELECT id, username, id_role FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    // $admin = null;

    // if (count($results_admin) > 0) {
    //     $admin = $results_admin;
    // } else {
    //     die();
    // }

    if (count($results) > 0) {
        $user = $results;
    } else {
        die();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- <head> -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de gestion de los restaurantes</title>
<link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/main.css">
</head>

<body>
    <nav id="site-navigation" class="row row-center" role="navigation">
        <div class="column">
            <h1>
                <a href="index.php">Sistema de restaurantes</a>
            </h1>
            <ul class="main-menu column clearfix">
                <?php if (empty($user)) : ?>
                <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                <li><a href="<?php echo SITE_URL; ?>/login.php">Login</a></li>
                <li><a href="<?php echo SITE_URL; ?>/signup.php">SignUp</a></li>
                <?php else : ?>
                <?php if ($user['id_role'] == '1') : ?>
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
    <div id="content">