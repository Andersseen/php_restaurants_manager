<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php
$error = false;

if (isset($_POST['submit-update-product'])) {
    //se ha enviado el formulario
    $name_input = $_POST['name'];
    $price_input = $_POST['price'];


    if (empty($name_input) || empty($price_input)) {
        $error = true;
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $id = $_GET['upd-product'];
        update_product($name, $price, $id);


        redirect_to('admin?action=list-restaurants&success-upd-prod=true');
    }
}

?>



<h2>Modificar plato</h2>

<?php if ($error) : ?>
    <div class="error">
        Error en el formulario
    </div>
<?php endif; ?>
<?php
$restaurant_found = false;

$all_products = get_all_products_for($_GET['upd-product']);

if (isset($_GET['upd-product'])) {
}


$product_found = get_product($_GET['upd-product']);


?>


<form method="post" action="">

    <!-- <?php if ($product_found) : ?> -->

    <label for="name">Nombre (requerido)</label>
    <input type="text" name="name" id="name" value="<?php echo $product_found->get_name(); ?>">

    <label for="price">Precio (requerido)</label>
    <input type="varchar" name="price" id="price" value="<?php echo $product_found->get_price(); ?>">

    <p>
        <input type="submit" name="submit-update-product" value="Nuevo plato">
    </p>
</form>
<?php endif; ?>
<?php require __DIR__ . '/../../templates/footer.php' ?>