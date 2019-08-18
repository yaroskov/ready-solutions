<?php

require_once dirname(__FILE__) . '/../../autoloader.php';

class EShopCatalog extends PaginationExecutor
{
    public function __construct()
    {
    }

    public function filters()
    {
        $filters = new Filters();
        return $filters->run();
    }

    public function products()
    {
        $query = "SELECT `models`.`name` as `model`, `devices_types`.`name` as `device` FROM `models` " .
            "INNER JOIN `products` " .
            "ON `products`.`models_id` = `models`.`id` " .
            "INNER JOIN `devices_types` " .
            "ON `devices_types`.`id` = `products`.`devices_types_id`";

        if ($this->pagination->itemsOnPage) {

            $offset = $this->pagination->itemsOnPage * ($this->pagination->currentPage - 1);
            $query = $query . " LIMIT " . $this->pagination->itemsOnPage . " OFFSET " . $offset;
        }

        $results = DB::connect(DB['eShop'])->query($query);

        return $results;
    }

    public function paginType($itemsOnPage, $currentPage = 1)
    {
        $pagination = new PaginationRealisation();
        return $pagination->pagination($itemsOnPage, $currentPage);
    }
}