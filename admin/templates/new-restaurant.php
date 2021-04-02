<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>
<h2>Crear nuevo restaurant</h2>

<?php if ($error) : ?>
<div class="error">
    Error en el formulario
</div>
<?php endif; ?>

<form method="post" action="" enctype="multipart/form-data">

    <label for="name">Nombre (requerido)</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">

    <label for="logo">Logo (requerido)</label>
    <input type="file" name="logo" id="logo" accept="image/x-png,image/gif,image/jpeg" multiple>

    <p>
        <input type="submit" name="submit-new-restaurant" value="Nuevo restaurant">
    </p>
</form>

<?php require __DIR__ . '/../../templates/footer.php' ?>