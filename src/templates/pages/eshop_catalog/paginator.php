<?php function pagination($eShopCatalog) { ?>
    <?php ob_start(); ?>
        <div class="yar-block yar-bg-white">
            <div class="yar-block__content yar-clock__content_highlighted">
                <div class="yar-pagination">

                    <?php if($eShopCatalog->pagination->getStartPage() > 1): ?>
                        <div class="yar-pagination__page yar-pagination__page_closing" data-page="1">1</div>
                    <?php endif; ?>

                    <?php for($i = $eShopCatalog->pagination->getStartPage(); $i <= $eShopCatalog->pagination->getEndPage(); $i++): ?>
                        <?php if($i == $eShopCatalog->pagination->getCurrentPage()): ?>
                            <div class="yar-pagination__page yar-pagination__page_selected" data-page="<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </div>
                        <?php else: ?>
                            <div class="yar-pagination__page" data-page="<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($eShopCatalog->pagination->getEndPage() < $eShopCatalog->pagination->getPagesTotal()): ?>
                        <div class="yar-pagination__page yar-pagination__page_closing" data-page="<?php echo $eShopCatalog->pagination->getPagesTotal(); ?>">
                            <?php echo $eShopCatalog->pagination->getPagesTotal(); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php return ob_get_clean(); ?>
<?php } ?>