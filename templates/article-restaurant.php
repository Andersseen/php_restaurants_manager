<?php if (isset($_GET['view'])) : ?>
<article class="restaurant">
    <header>

        <h2 class="restaurant-title">

            <?php echo $restaurant->get_name(); ?>

        </h2>

    </header>
</article>


<?php else : ?>
<article class="restaurant">
    <header>
        <h2 class="restaurant-title">
            <a href="?view=<?php echo $restaurant->get_id(); ?>">
                <?php echo $restaurant->get_name(); ?>
            </a>
        </h2>
    </header>
</article>
<?php endif; ?>