<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php if (isset($_GET['success'])) : ?>
<div class="success">
    El restaurant ha sido creado
</div>
<?php endif; ?>

<?php if (isset($_GET['success-del'])) : ?>
<div class="error">
    El restaurant ha sido eliminado correctamente
</div>
<?php endif; ?>

<table>
    <?php foreach ($all_restaurants as $restaurant) : ?>
    <tr>
        <td><?php echo $restaurant->get_name(); ?></td>
        <td><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&delete-restaurant=' . $restaurant->get_id(); ?>&hash=<?php echo generate_hash('delete-restaurant-' . $restaurant->get_id()); ?>">Eliminar
                restaurant</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require __DIR__ . '/../../templates/footer.php' ?>