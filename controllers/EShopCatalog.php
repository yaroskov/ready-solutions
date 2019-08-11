<?php

require_once dirname(__FILE__) . '/db/DB.php';
require_once dirname(__FILE__) . '/../connections.php';

class EShopCatalog
{
    public $filters = [
        'devices' => ['title' => 'Device', 'selected' => ['name' => '', 'id' => '']],
        'models' => ['title' => 'Model', 'selected' => ['name' => '', 'id' => '']],
        'colors' => ['title' => 'Color', 'selected' => ['name' => '', 'id' => '']],
        ];

    public $startPage, $endPage, $pagesTotal, $currentPage, $itemsOnPage;

    public function singleFilter($key, $query)
    {
        $results = DB::connect(DB['eShop'])->query($query);

        foreach ($results as $i => $result) {
            $this->filters[$key]['data'][$i]['name'] = $result['name'];
            $this->filters[$key]['data'][$i]['id'] = $result['id'];
        }
    }

    public function addFilterSections() {

    }

    public function filters()
    {
        $this->singleFilter('devices', 'SELECT * FROM `devices_types`');

        if (isset($_GET['data'])) {

            $data = $_GET['data'];

            foreach ($this->filters as $key => $filter) {

                if (isset($data[$key])) {
                    $this->filters[$key]['selected'] = $data[$key];
                }
            }

            if ($data['devices']['id']) {

                $this->singleFilter('models', 'SELECT * FROM `models` WHERE `devices_types_id` = ' . $data['devices']['id']);

                if ($data['models']['id']) {

                    $this->singleFilter('colors', 'SELECT * FROM `colors`');
                }
            }
        }

        return $this->filters;
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

    public function pagination($itemsOnPage, $currentPage = 1, $shownPages = 3)
    {
        $query = "SELECT COUNT(*) as `sum` FROM `models` " .
            "INNER JOIN `products` " .
            "ON `products`.`models_id` = `models`.`id` " .
            "INNER JOIN `devices_types` " .
            "ON `devices_types`.`id` = `products`.`devices_types_id`";

        $results = DB::connect(DB['eShop'])->query($query);

        $sum = $results[0]['sum'];

        $this->itemsOnPage = $itemsOnPage;
        $pagesTotal = $sum / $itemsOnPage;
        $pagesTotal = ceil($pagesTotal);
        $pagesTotal = intval($pagesTotal);

        $this->currentPage = $currentPage;

        if ($shownPages > $pagesTotal) {
            $shownPages = $pagesTotal;
        }

        if ($pagesTotal > 2) {

            $steps = $shownPages - 1;

            $startPage = $endPage = $this->currentPage;

            while ($steps > 0) {
                if ($startPage > 1) {
                    $startPage--;
                    $steps--;
                }
                if ($endPage < $pagesTotal) {
                    $endPage++;
                    $steps--;
                }
            }
        } else {
            $startPage = 1;
            $endPage = $pagesTotal;
        }

        $this->startPage = $startPage;
        $this->endPage = $endPage;
        $this->pagesTotal = $pagesTotal;

        return $this;
    }
}