<?php include_once './pdo/pdo.php'; ?>

<?php
if (isset($_POST['id_product'])) {
    add_product_in_cart($_POST['id_product']);
}