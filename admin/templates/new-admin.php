<?php require __DIR__  . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php

$error = false;

$name = '';
$surname = '';
$email = '';
$username = '';
$password = '';
$id_role = 1;

if (isset($_POST['submit-new-admin'])) {
    //se ha enviado el formulario

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $id_role = 1;

    if (empty($name) || empty($surname) || empty($email) || empty($username)) {
        $error = true;
    } else {
        //guardo
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente

        insert_user($name, $surname, $email, $username, $password, $id_role);
        //redirect_to( 'index.php?success=true' );
        redirect_to('admin?action=list-users&success=true');
    }
}

?>
<h2>Crear nuevo restaurant</h2>

<?php if ($error) : ?>
<div class="error">
    Error en el formulario
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
        <input type="submit" name="submit-new-admin" class="btn btn-success" value="Nuevo Admin">
    </div>
</form>

<?php require __DIR__ . '/../../templates/footer.php' ?>