<?php require __DIR__ . '/../../templates/header.php' ?>
<h2>Crear nuevo restaurant</h2>

<?php if ($error) : ?>
<div class="error">
    Error en el formulario
</div>
<?php endif; ?>

<form action="" method="post">

    <label for="name">Nombre (requerido)</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">

    <label for="logo">Logo (requerido)</label>
    <input type="file" name="logo" id="logo" value="<?php echo htmlspecialchars($logo, ENT_QUOTES); ?>">

    <p>
        <input type="submit" name="submit-new-restaurant" value="Nuevo restaurant">
    </p>
</form>

<?php require __DIR__ . '/../../templates/footer.php' ?>