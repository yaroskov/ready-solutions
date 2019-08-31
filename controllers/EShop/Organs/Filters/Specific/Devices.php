<?php
namespace Controllers\EShop\Organs\Filters\Specific;

use Controllers\EShop\Organs\Filters\Specific\Single\Single;
use Controllers\EShop\Organs\Filters\iFilter;

class Devices extends Single implements iFilter
{
    public function getFilterData($data = '')
    {
        $query = 'SELECT * FROM `devices_types`';

        return $this->filter($query);
    }
}