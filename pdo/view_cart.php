<?php require '../init.php' ?>
<?php require '../verification.php' ?>
<?php require '../templates/header.php'; ?>

<?php include_once 'pdo.php' ?>
<?php



if (isset($_POST['delete-item'])) {
    delete_product_in_cart($_POST['delete-item']);
}

if (!empty($user_ses)) {
    $products = get_products_in_cart();
    if (count($products) <= 0) { ?>
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Todavía no hay productos
            </h1>

        </div>
    </div>
</section>
<?php } else { ?>
<div class="columns">
    <div class="column">
        <h2 class="is-size-2">Mi carrito de compras</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Quitar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $total = 0;
                        foreach ($products as $product) {
                            $price = floatval($product->price);
                            $total += $price;
                        ?>
                <tr>
                    <td><?php echo $product->name ?></td>
                    <td>$<?php echo number_format($price, 2) ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="delete-item" value="<?php echo $product->id ?>">
                            <button class="button is-danger">
                                <i class="fa fa-trash-o">-</i>
                            </button>
                        </form>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                    <td colspan="2" class="is-size-4">
                        $<?php
                                    $total = number_format($total, 2);
                                    echo $total
                                    ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <form action="" method="post">
            <input type="hidden" name="id-item" value="<?php echo $product->id ?>">

            <input type="hidden" name="id-rest" value="<?php echo $product->id_restaurant ?>">
            <input type="submit" name="submit-ticket" value="Terminar
                    compra">
        </form>


    </div>
</div>
<?php } ?>
<?php } else { ?>
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                No puedes hacer pedido si no logeaste
            </h1>

        </div>
    </div>
</section>

<?php } ?>
<?php include_once "../templates/footer.php" ?>
<?php
if (isset($_POST['submit-ticket'])) {
    final_click($_POST['id-item'], $_POST['id-rest'], $user_ses['id'], $total);
    delete_all_in_cart();
    redirect_to('index.php');
}