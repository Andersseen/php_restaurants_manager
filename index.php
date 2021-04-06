<?php require 'init.php'; ?>
<?php include_once './pdo/pdo.php'; ?>
<?php
if (isset($_POST['id_product'])) {
    add_product_in_cart($_POST['id_product']);
}

$all_restaurants = get_all_restaurants();
$all_products = get_all_products();

//Nueva Lógica para mostrar un post u otro individualemnte cogiéndolos de la bbdd
$restaurant_found = false;
$product_found = false;
if (isset($_GET['view'])) {
    $restaurant_found = get_restaurant($_GET['view']);
    // $all_products = get_product_for($restaurant_found);
    $product_found = get_product_for($_GET['view']);
    $all_products_for = get_all_products_for($_GET['view']);
    if ($restaurant_found) {
        $all_restaurants = [$restaurant_found];

        $all_products = [$product_found];
    }
}

?>



<?php require 'verification.php' ?>
<?php require './templates/header.php'; ?>

<?php if (!empty($user_ses)) : ?>
<div class="container">
    <div class="row">
        <h5 class="text-uppercase fw-bold fst-italic mb-5 col-10 text-start">Hola <?php echo $user_ses['username']; ?>
        </h5>
        <a href="<?php echo SITE_URL . '/pdo/view_cart.php'; ?>" class="float-md-end mb-0 col-2"><i
                class="fas fa-shopping-cart">Carrito</i></a>
    </div>
</div>
<?php endif; ?>


<?php if (isset($_GET['success'])) : ?>
<div class="alert alert-success" role="alert">
    <?php echo 'Has creado usuario correctamente!'; ?>
</div>
<?php endif; ?>
<?php if (isset($_GET['success-add-order'])) : ?>
<div class="alert alert-success" role="alert">
    Muchas gracias por elegir nosotros!
</div>
<?php endif; ?>

<div class="restaurants">
    <?php foreach ($all_restaurants as $restaurant) : ?>
    <?php require './templates/article-restaurant.php'; ?>


    <?php endforeach; ?>
    <?php if ($restaurant_found) : ?>

    <div class="restaurant-content container">
        <div class="row">
            <div class="col-4">
                <img class="img__item" src="<?php echo $restaurant->get_logo(); ?>" />
            </div>

            <div class="restaurant-menu col-8">
                <h4>Menu</h4>
                <?php foreach ($all_products_for as $product) : ?>
                <div class="restaurant-menu-item container">
                    <div class="row">
                        <div class="menu__item row pb-2">

                            <div class="col-4 "><?php echo $product->get_name(); ?></div>
                            <div class="col-4"><?php echo $product->get_price(); ?></div>

                            <form action="" method="post" class=" col-4">
                                <input type="hidden" name="id_product" value="<?php echo $product->id ?>">
                                <button class="btn btn-success">+</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>


        <?php endif; ?>
    </div>
    <?php require './templates/restaurant-content-end.php'; ?>



</div>
<!-- <div class="view-cart">
    <a href="<?php echo SITE_URL . '/pdo/view_cart.php'; ?>"><i class="fas fa-shopping-cart">Carrito</i>
    </a>
</div> -->


<?php require './templates/footer.php'; ?>