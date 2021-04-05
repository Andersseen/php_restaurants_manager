<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>



<?php
$restaurant_found = false;

if (isset($_GET['list-products'])) {
}
$restaurant_found = get_restaurant($_GET['list-products']);
$all_products_for = get_all_products_for($_GET['list-products']);

if ($restaurant_found) {
    $all_restaurants = [$restaurant_found];
}
?>
<?php foreach ($all_restaurants as $restaurant) : ?>
<h6>
    <?php echo $restaurant->get_name(); ?>
</h6>
<?php endforeach; ?>


<table>
    <?php foreach ($all_products_for as $product) : ?>
    <tr>
        <td><?php echo $product->get_name(); ?></td>
        <td>
            <?php echo $product->get_price(); ?>
        </td>
        <td><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&upd-product=' . $product->get_id(); ?>&hash=<?php echo generate_hash('upd-product-' . $product->get_id()); ?>">Modificar
                item</a></td>
        <td><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&delete-product=' . $product->get_id(); ?>&hash=<?php echo generate_hash('delete-product-' . $product->get_id()); ?>">Eliminar
                item</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="restaurant-content-end">
    <a href="<?php echo SITE_URL . '/admin/?action=list-restaurants'; ?>">Volver
    </a>
</div>

<?php require __DIR__ . '/../../templates/footer.php' ?>