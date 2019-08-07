<?php

require_once dirname(__FILE__) . '/db/DB.php';
require_once dirname(__FILE__) . '/../connections.php';

class EShopCatalog
{
    public $filters = [];

    public function singleFilter($key, $title, $query)
    {
        $devices = DB::connect(DB['eShop'])->query($query);

        $this->filters[$key]['title'] = $title;

        foreach ($devices as $device) {
            $this->filters[$key]['data'][] = $device['name'];
        }
    }

    public function filters()
    {
        $this->singleFilter('devices', 'Device', 'SELECT * FROM `devices_types`');
        $this->singleFilter('models', 'Model', 'SELECT * FROM `models`');
        $this->singleFilter('colors', 'Color', 'SELECT * FROM `colors`');

        return $this->filters;
    }

    public function products()
    {

    }
}