<?php
require_once dirname(__FILE__) . '/../../../../controllers/EShopCatalog.php';

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
    <div class="yar-block__content yar-clock__content_highlighted">
        <div class="yar-filters-panel">

            <?php $end = end($filters); ?>
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

                <?php if($filter != $end): ?>
                    <div class="yar-filters-panel__line"></div>
                <?php endif; ?>
            <?php endforeach; ?>
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