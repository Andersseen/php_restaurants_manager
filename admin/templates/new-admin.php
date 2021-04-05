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
        <input type="submit" name="submit-new-admin" value="Nuevo Admin">
    </p>
</form>
<div class="restaurant-content-end">
    <a href="<?php echo SITE_URL . '/admin/'; ?>">Volver
    </a>
</div>

<?php require __DIR__ . '/../../templates/footer.php' ?>