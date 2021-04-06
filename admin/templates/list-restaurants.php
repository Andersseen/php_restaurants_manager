<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php if (isset($_GET['success'])) : ?>
<div class="alert alert-success" role="alert">
    El restaurant ha sido creado
</div>
<?php endif; ?>

<?php if (isset($_GET['success-del'])) : ?>
<div class="alert alert-danger" role="alert">
    El restaurant ha sido eliminado correctamente
</div>
<?php endif; ?>
<?php if (isset($_GET['success-del-prod'])) : ?>
<div class="alert alert-danger" role="alert">
    El plato ha sido eliminado correctamente
</div>
<?php endif; ?>
<?php if (isset($_GET['success-add-products'])) : ?>
<div class="alert alert-success">
    El plato ha sido agregado correctamente
</div>
<?php endif; ?>

<?php if (isset($_GET['success-upd-rest'])) : ?>
<div class="alert alert-success" role="alert">
    El restaurante ha sido modificado correctamente
</div>
<?php endif; ?>
<?php if (isset($_GET['success-upd-prod'])) : ?>
<div class="alert alert-success" role="alert">
    El plato ha sido cambiado correctamente
</div>
<?php endif; ?>

<table class=" table table-dark table-hover list-table">
    <?php foreach ($all_restaurants as $restaurant) : ?>
    <tr class="table-dark">
        <td class="table-dark"><?php echo $restaurant->get_name(); ?></td>
        <td class="table-danger"><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&delete-restaurant=' . $restaurant->get_id(); ?>&hash=<?php echo generate_hash('delete-restaurant-' . $restaurant->get_id()); ?>">Eliminar
                restaurant</a></td>
        <td class="table-warning"><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&update-restaurant=' . $restaurant->get_id(); ?>&hash=<?php echo generate_hash('update-restaurant-' . $restaurant->get_id()); ?>">Modificar
                restaurant</a></td>
        <td class="table-success"><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&add-products=' . $restaurant->get_id(); ?>&hash=<?php echo generate_hash('add-products-' . $restaurant->get_id()); ?>">Agregar
                platos
            </a></td>
        <td class="table-warning"><a
                href="<?php echo SITE_URL . '/admin?action=list-restaurants&list-products=' . $restaurant->get_id(); ?>&hash=<?php echo generate_hash('list-products-' . $restaurant->get_id()); ?>">Modificar
                platos
            </a></td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="restaurant-content-end">
    <a href="<?php echo SITE_URL . '/admin/'; ?>">Volver
    </a>
</div>

<?php require __DIR__ . '/../../templates/footer.php' ?>