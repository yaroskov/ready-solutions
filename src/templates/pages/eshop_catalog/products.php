<?php function products($products) { ?>
    <?php ob_start(); ?>
        <div class="yar-block">
            <div class="yar-block__content yar-clock__content_highlighted">
                <div class="yar-products">
                    <?php foreach ($products as $product): ?>
                        <div class="yar-products__product">
                            <div class="yar-products__image"></div>
                            <div class="yar-products__product-name">
                                <?php echo $product['device'] . " " . $product['model']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php return ob_get_clean(); ?>
<?php } ?>