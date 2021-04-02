<?php require __DIR__  . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>
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

<?php require __DIR__ . '/../../templates/footer.php' ?>