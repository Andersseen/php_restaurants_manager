<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>

<?php if (isset($_GET['success'])) : ?>
<div class="alert alert-success" role="alert">
    El user ha sido creado
</div>
<?php endif; ?>

<?php if (isset($_GET['success-del'])) : ?>
<div class="alert alert-danger" role="alert">
    El user ha sido eliminado correctamente
</div>
<?php endif; ?>
<?php if (isset($_GET['success-upd'])) : ?>
<div class="alert alert-success" role="alert">
    El user ha sido modificado correctamente
</div>
<?php endif; ?>




<table class="table table-dark table-hover list-table">
    <?php foreach ($all_users as $user) : ?>
    <tr>
        <td><?php echo $user->get_name(); ?></td>
        <?php if ($user->get_username() == $user_ses['username']) : ?>
        <?php else : ?>
        <?php if ($user->get_id_role() == 2) : ?>
        <td class="table-danger"><a
                href="<?php echo SITE_URL . '/admin?action=list-users&delete-user=' . $user->get_id(); ?>&hash=<?php echo generate_hash('delete-user-' . $user->get_id()); ?>">Eliminar
                user</a></td>
        <td class="table-success"><a
                href="<?php echo SITE_URL . '/admin?action=list-users&update-admin=' . $user->get_id(); ?>&hash=<?php echo generate_hash('update-admin-' . $user->get_id()); ?>">Hacer
                admin</a></td>
        <?php else : ?>
        <td><a
                href="<?php echo SITE_URL . '/admin?action=list-users&update-user=' . $user->get_id(); ?>&hash=<?php echo generate_hash('update-user-' . $user->get_id()); ?>">Hacer
                user</a></td>
    </tr>
    <?php endif; ?>
    <?php endif; ?>
    <?php endforeach; ?>
</table>
<div class="restaurant-content-end">
    <a href="<?php echo SITE_URL . '/admin/'; ?>">Volver
    </a>
</div>

<?php require __DIR__ . '/../../templates/footer.php' ?>