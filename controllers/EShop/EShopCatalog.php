<?php

require_once dirname(__FILE__) . '/../../autoloader.php';

class EShopCatalog
{
    public $itemsOnPage, $currentPage, $pagination;

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

        if ($this->itemsOnPage) {

            $offset = $this->itemsOnPage * ($this->currentPage - 1);
            $query = $query . " LIMIT " . $this->itemsOnPage . " OFFSET " . $offset;
        }

        $results = DB::connect(DB['eShop'])->query($query);

        return $results;
    }

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
        $this->itemsOnPage = $itemsOnPage;
        $this->currentPage = $currentPage;

        $itemTotal = $this->itemsNumber();
        $this->pagination = new Pagination();
        $this->pagination->run($itemsOnPage, $itemTotal, $currentPage);

        return $this;
    }
}