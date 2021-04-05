<?php require 'init.php'; ?>
<?php


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
<div class="title-username">
    <h5>Hola</h5>
    <h5> <?php echo $user_ses['username']; ?></h5>
</div>
<?php endif; ?>

<?php if (isset($_GET['success'])) : ?>
<div class="success">

    <?php echo 'Has creado usuario correctamente!'; ?>

</div>
<?php endif; ?>

<div class="restaurants">
    <?php foreach ($all_restaurants as $restaurant) : ?>
    <?php require './templates/article-restaurant.php'; ?>


    <?php endforeach; ?>
    <?php if ($restaurant_found) : ?>

    <div class="restaurant-content">

        <img src="<?php echo $restaurant->get_logo(); ?>" />
        <div class="restaurant-menu">
            <h4>Menu</h4>
            <?php foreach ($all_products_for as $product) : ?>
            <div class="restaurant-menu-item">
                <?php echo $product->get_name(); ?>
                <?php echo $product->get_price(); ?>
            </div>

            <?php endforeach; ?>
        </div>

        <?php else : ?>

        <a href="?view=<?php echo $restaurant->get_id(); ?>">

            <img src="<?php $restaurant->get_logo(); ?>" />
        </a>

        <?php endif; ?>
    </div>
    <?php require './templates/restaurant-content-end.php'; ?>



</div>


<?php require './templates/footer.php'; ?>