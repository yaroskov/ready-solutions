<?php
require_once dirname(__FILE__) . '/../../../controllers/EShopCatalog.php';

$eShopCatalog = new EShopCatalog();
$filters = $eShopCatalog->filters();

$products = $eShopCatalog->pagination(2, 2)->products();

?>

<div class="yar-block">
    <div class="yar-block__content">
        <h2 class="page-title">E-market Catalog</h2>
    </div>
</div>

<div class="yar-block yar-bg-white">
    <div class="yar-block__content yar-clock__content_highlighted">
        <div class="yar-filters-panel">

            <?php foreach ($filters as $filter): ?>
                <div class="yar-filters-panel__filter">
                    <div class="yar-filters-panel__filter-title"><?php echo $filter['title']; ?></div>
                    <div class="yar-filters-panel__filter-list" style="display: none;">
                        <ul class="yar-filters-list">
                            <?php foreach ($filter['data'] as $item): ?>
                                <li class="yar-filters-list__item"><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="yar-filters-panel__line"></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

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

<div class="yar-block yar-bg-white">
    <div class="yar-block__content yar-clock__content_highlighted">
        <div class="yar-pagination">

            <?php if($eShopCatalog->startPage > 1): ?>
                <div class="yar-pagination__page yar-pagination__page_closing">1</div>
            <?php endif; ?>

            <?php for($i = $eShopCatalog->startPage; $i <= $eShopCatalog->endPage; $i++): ?>
                <?php if($i == $eShopCatalog->currentPage): ?>
                    <div class="yar-pagination__page yar-pagination__page_selected"><?php echo $i; ?></div>
                <?php else: ?>
                    <div class="yar-pagination__page"><?php echo $i; ?></div>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if($eShopCatalog->endPage < $eShopCatalog->pagesTotal): ?>
                <div class="yar-pagination__page yar-pagination__page_closing"><?php echo $eShopCatalog->pagesTotal; ?></div>
            <?php endif; ?>

        </div>
    </div>
</div>