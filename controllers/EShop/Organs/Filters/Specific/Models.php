<?php

class Models extends Single implements iFilter
{
    public function getFilterData($data = '')
    {
        $query = 'SELECT * FROM `models` WHERE `devices_types_id` = ' . $data;

        return $this->filter($query);
    }
}