<?php

class PaginationRealisation implements paginationRealize
{
    public function itemsNumber()
    {
        $query = "SELECT COUNT(*) as `sum` FROM `models` " .
            "INNER JOIN `products` " .
            "ON `products`.`models_id` = `models`.`id` " .
            "INNER JOIN `devices_types` " .
            "ON `devices_types`.`id` = `products`.`devices_types_id`";

        $results = DB::connect(DB['eShop'])->query($query);

        return $results[0]['sum'];
    }

    public function pagination($itemsOnPage, $currentPage = 1)
    {
        $itemTotal = $this->itemsNumber();
        $pagination = new Pagination();
        $pagination->run($itemsOnPage, $itemTotal, $currentPage);

        return $pagination;
    }
}