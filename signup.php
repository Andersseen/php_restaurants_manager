<?php require('init.php'); ?>
<?php
$error = false;
$role = 2;




if (isset($_POST['submit-create'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = true;
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        create_user($name, $surname, $_POST['email'], $_POST['username'], $_POST['password'], $role);
    }
}



?>

<?php require('templates/header.php'); ?>
<?php if (isset($_GET['error'])) : ?>
<div class="error">

    <?php echo 'Usario con este nombre de usario ya existe'; ?>

</div>
<?php endif; ?>

<h2>SignUp</h2>

<?php if ($error) : ?>
<div class="error">
    <?php echo 'Error de usuario o contraseña'; ?>
</div>
<?php endif; ?>

<form action="" method="post">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">

    <label for="surname">Apellido</label>
    <input type="text" name="surname" id="surname">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="username">Nombre de usuario</label>
    <input type="text" name="username" id="username">

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">



    <p>
        <input type="submit" name="submit-create" value="SignUp">
    </p>
</form>

<?php require('templates/footer.php'); ?>