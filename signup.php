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
<div class="alert alert-danger" role="alert">
    <?php echo 'Error de usuario o contraseña'; ?>
</div>
<?php endif; ?>

<form action="" method="post">

    <div class="mb-1">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-1">
        <label for="surname">Apellido</label>
        <input type="text" class="form-control" name="surname" id="surname">
    </div>

    <div class="mb-1">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-1">
        <label for="username">Nombre de usuario</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="mb-1">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>

    <div class="col-auto">
        <input type="submit" name="submit-create" class="btn btn-warning" value="SignUp">
    </div>
</form>

<?php require('templates/footer.php'); ?>