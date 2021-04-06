<?php require __DIR__ . '/../../verification.php' ?>
<?php require __DIR__ . '/../../templates/header.php' ?>


<h2>Administración</h2>

<div class="list-group">

    <a href="?action=list-restaurants" class="list-group-item list-group-item-action p-1 list-group-item-dark">Listado
        de restaurants</a>
    <a href="?action=new-restaurant" class="list-group-item list-group-item-action p-1 list-group-item-dark">Nuevo
        restaurant</a>
    <a href="?action=list-users" class="list-group-item list-group-item-action p-1 list-group-item-dark">Listado de
        users</a>
    <a href="?action=new-admin" class="list-group-item list-group-item-action p-1 list-group-item-dark">Nuevo
        admin</a>
</div>


<?php require __DIR__ . '/../../templates/footer.php' ?>