<?php

class Colors extends Single implements iFilter
{
    public function getFilterData($data = '')
    {
        $query = "SELECT `colors`.`name`, `colors`.`products_count_id`, `colors`.`id` FROM `colors` " .
            "INNER JOIN `products_count` " .
            "ON `products_count`.`id` = `colors`.`products_count_id` " .
            "INNER JOIN `models` " .
            "ON `models`.`id` = `products_count`.`models_id` " .
            "WHERE `products_count`.`models_id` = " . $data;

        return $this->filter($query);
    }
}