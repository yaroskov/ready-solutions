<?php
require_once dirname(__FILE__) . '/../../../controllers/EShopCatalog.php';

$eShopCatalog = new EShopCatalog();
$filters = $eShopCatalog->filters();
?>

<div class="yar-block">
    <div class="yar-block__content yar-bg-white">
        <div class="yar-filters-panel">

            <?php foreach ($filters as $filter): ?>
                <div class="yar-filters-panel__filter ">
                    <div class="yar-filters-panel__filter-title"><?php echo $filter; ?></div>
                    <div class="yar-filters-panel__filter-list">
                        <ul class="yar-filters-list">
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                            <li class="yar-filters-list__item">List item</li>
                        </ul>
                    </div>
                </div>

                <div class="yar-filters-panel__line"></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="yar-block">
    <div class="yar-block__content yar-bg-white">
        <div class="yar-products">
            <div class="yar-products__product">
                <div class="yar-products__image"></div>
                <div class="yar-products__product-name">Product Name</div>
            </div>
            <div class="yar-products__product">
                <div class="yar-products__image"></div>
                <div class="yar-products__product-name">Product Name</div>
            </div>
            <div class="yar-products__product">
                <div class="yar-products__image"></div>
                <div class="yar-products__product-name">Product Name</div>
            </div>
            <div class="yar-products__product">
                <div class="yar-products__image"></div>
                <div class="yar-products__product-name">Product Name</div>
            </div>
            <div class="yar-products__product">
                <div class="yar-products__image"></div>
                <div class="yar-products__product-name">Product Name</div>
            </div>
        </div>
    </div>
</div>

<div class="yar-block">
    <div class="yar-block__content yar-bg-white">
        <div class="yar-pagination">
            <div class="yar-pagination__page">1</div>
            <div class="yar-pagination__page">2</div>
            <div class="yar-pagination__page">3</div>
        </div>
    </div>
</div>