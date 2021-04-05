<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php
$error = false;

if (isset($_POST['submit-update-restaurant'])) {
    //se ha enviado el formulario
    $name_input = $_POST['name'];
    $img_input = $_POST['logo'];

    if (empty($name_input)) {
        $error = true;
    } elseif (empty($img_input)) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        update_restaurant_without_img($name, $_GET['update-restaurant']);
        redirect_to('admin?action=list-restaurants&success-upd-rest=true');
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        $logo = $_FILES['logo']['tmp_name'];
        $logo_name = $_FILES['logo']['name'];
        //ruta de la imagen para guardar la ruta en la bbdd
        $imgContent = addslashes(file_get_contents($logo));
        $dir_download = $_SERVER['DOCUMENT_ROOT'] . '/mi-proecto/proyecto/assets/logos/';
        $logo_db = './assets/logos/' . $logo_name;
        //guardo
        sleep(2);
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        move_uploaded_file($logo, $dir_download . $logo_name);
        update_restaurant($name, $logo_db, $_GET['update-restaurant']);

        redirect_to('admin?action=list-restaurants&success-upd-rest=true');
    }
}

?>



<h2>Modificar restaurant</h2>

<?php if ($error) : ?>
<div class="error">
    Error en el formulario
</div>
<?php endif; ?>
<?php
$restaurant_found = false;

if (isset($_GET['update-restaurant'])) {
}
$restaurant_found = get_restaurant($_GET['update-restaurant']);

if ($restaurant_found) {
    $all_restaurants = [$restaurant_found];
}
?>


<form method="post" action="" enctype="multipart/form-data">
    <!-- <?php if ($restaurant_found) : ?> -->
    <?php foreach ($all_restaurants as $restaurant) : ?>


    <label for="name">Nombre (requerido)</label>
    <input type="text" name="name" id="name" value="<?php echo $restaurant->get_name(); ?>">

    <label for="logo">Logo (requerido)</label>
    <input type="file" name="logo" id="logo" accept="image/x-png,image/gif,image/jpeg" multiple>

    <p>
        <input type="submit" name="submit-update-restaurant" value="Nuevo restaurant">
    </p>

    <?php endforeach; ?>
    <?php endif; ?>
</form>

<?php require __DIR__ . '/../../templates/footer.php' ?>