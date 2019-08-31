<?php
namespace Controllers\EShop\Organs\Filters\Specific;

use Controllers\EShop\Organs\Filters\Specific\Single\Single;
use Controllers\EShop\Organs\Filters\iFilter;

class Models extends Single implements iFilter
{
    public function getFilterData($data = '')
    {
        $query = 'SELECT * FROM `models` WHERE `devices_types_id` = ' . $data;

        return $this->filter($query);
    }
}