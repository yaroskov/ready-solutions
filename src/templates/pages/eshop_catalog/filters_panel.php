<?php function filtersPanel($filters) { ?>
    <?php ob_start(); ?>

        <?php $end = end($filters); ?>
        <?php foreach ($filters as $key => $filter): ?>
            <div class="yar-filters-panel__filter <?php echo isset($filter['data']) ? 'active' : 'yar-filters-panel__filter_inactive'; ?>">
                <div class="yar-filters-panel__filter-title"
                     data-name="<?php echo $filter['selected']['name']; ?>"
                     data-id="<?php echo $filter['selected']['id']; ?>"
                     data-key="<?php echo $key; ?>">
                    <?php echo $filter['selected']['name'] ? $filter['selected']['name'] : $filter['title']; ?>
                </div>

                <?php if(isset($filter['data'])): ?>
                    <div class="yar-filters-panel__filter-list" style="display: none;">
                        <ul class="yar-filters-list">
                            <?php foreach ($filter['data'] as $item): ?>
                                <li class="yar-filters-list__item" data-name="<?php echo $item['name']; ?>" data-id="<?php echo $item['id']; ?>">
                                    <?php echo $item['name']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($filter != $end): ?>
                <div class="yar-filters-panel__line"></div>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php return ob_get_clean(); ?>
<?php } ?>