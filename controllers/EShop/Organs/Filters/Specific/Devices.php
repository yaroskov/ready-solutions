<?php

class Devices extends Single implements iFilter
{
    public function getFilterData($data = '')
    {
        $query = 'SELECT * FROM `devices_types`';

        return $this->filter($query);
    }
}