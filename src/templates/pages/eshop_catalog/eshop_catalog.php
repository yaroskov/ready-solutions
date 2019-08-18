<?php

$eShopCatalog = new EShopCatalog();
$filters = $eShopCatalog->filters();

$products = $eShopCatalog->pagination(2, 1)->products();
?>

<div class="yar-block">
    <div class="yar-block__content">
        <h2 class="page-title">E-market Catalog</h2>
    </div>
</div>

<div class="yar-block yar-bg-white">
    <div class="yar-block__content">

        <div class="yar-filters-panel">
            <?php require_once dirname(__FILE__) . '/filters_panel.php'; ?>
            <?php echo filtersPanel($filters); ?>
        </div>

    </div>
</div>

<div id="products">
    <?php require_once dirname(__FILE__) . '/products.php'; ?>
    <?php echo products($products); ?>
</div>

<div id="pagination">
    <?php require_once dirname(__FILE__) . '/paginator.php'; ?>
    <?php echo pagination($eShopCatalog); ?>
</div>