<?php require 'init.php'; ?>
<?php


$all_restaurants = get_all_restaurants();

//Nueva Lógica para mostrar un post u otro individualemnte cogiéndolos de la bbdd
$restaurant_found = false;
if (isset($_GET['view'])) {
    $restaurant_found = get_restaurant($_GET['view']);
    if ($restaurant_found) {
        $all_restaurants = [$restaurant_found];
    }
}

?>

<?php require './templates/header.php'; ?>

<div class="restaurants">
    <?php foreach ($all_restaurants as $restaurant) : ?>
    <article class="restaurant">
        <header>
            <h2 class="post-title">
                <a href="?view=<?php echo $restaurant['id']; ?>">
                    <?php echo $restaurant['name']; ?>
                </a>
            </h2>
        </header>
        <div class="restaurant-content">
            <?php if ($restaurant_found) : ?>

            <img src="<?php echo $restaurant['logo']; ?>" />
            <?php else : ?>
            <img src="<?php echo $restaurant['logo']; ?>" />


            <?php endif; ?>
        </div>

    </article>
    <?php endforeach; ?>
</div>

<?php require './templates/footer.php'; ?>