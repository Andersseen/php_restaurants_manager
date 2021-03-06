<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php

$error = false;

if (isset($_POST['submit-add-product'])) {
    //se ha enviado el formulario
    $error = false;

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);

    $id_restaurant = filter_input(INPUT_POST, 'id-restaurant', FILTER_SANITIZE_STRING);

    if (empty($name) || empty($price)) {
        $error = true;
    } else {
        //guardo

        insert_product($name, $price, $id_restaurant);

        redirect_to('admin?action=list-restaurants&success-add-products=true');
    }
}

?>

<h2>Agregar mas platos</h2>

<?php if ($error) : ?>
    <div class="alert alert-danger" role="alert">
        Error en el formulario
    </div>
<?php endif; ?>
<?php
$restaurant_found = false;

if (isset($_GET['add-products'])) {
}
$restaurant_found = get_restaurant($_GET['add-products']);

if ($restaurant_found) {
    $all_restaurants = [$restaurant_found];
}
?>

<form method="post" action="">
    <?php if ($restaurant_found) : ?>
        <?php foreach ($all_restaurants as $restaurant) : ?>
            <div class="mb-3">
                <label for="name">Nombre (requerido)</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="name">Precio (requerido)</label>
                <input type="varchar" name="price" class="form-control" id="name">
            </div>
            <input type="hidden" name="id-restaurant" class="form-control" id="id-restaurant" value="<?php echo $restaurant->get_id(); ?>">
            <div class="col-auto">
                <input type="submit" name="submit-add-product" class="btn btn-success" value="Nuevo plato">
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</form>


<?php require __DIR__ . '/../../templates/footer.php' ?>