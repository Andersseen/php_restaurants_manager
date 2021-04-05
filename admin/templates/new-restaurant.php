<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php

$error = false;
$name = '';
$logo = '';


if (isset($_POST['submit-new-restaurant'])) {
    //se ha enviado el formulario


    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    // $logo = filter_input(INPUT_POST, 'logo', FILTER_SANITIZE_STRING);
    $logo = $_FILES['logo']['tmp_name'];
    $logo_name = $_FILES['logo']['name'];
    //ruta de la imagen para guardar la ruta en la bbdd
    $imgContent = addslashes(file_get_contents($logo));
    $dir_download = $_SERVER['DOCUMENT_ROOT'] . '/mi-proecto/proyecto/assets/logos/';
    $logo_db = './assets/logos/' . $logo_name;


    if (empty($name) || empty($logo)) {
        $error = true;
    } else {
        //guardo
        sleep(2);
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($logo, $dir_download . $logo_name);
        insert_restaurant($name, $logo_db);
        //redirect_to( 'index.php?success=true' );
        redirect_to('admin?action=list-restaurants&success=true');
    }
}

?>
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
<div class="restaurant-content-end">
    <a href="<?php echo SITE_URL . '/admin/'; ?>">Volver
    </a>
</div>

<?php require __DIR__ . '/../../templates/footer.php' ?>