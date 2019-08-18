<?php

abstract class Single
{
    public function filter($query)
    {
        $results = DB::connect(DB['eShop'])->query($query);

        $filters = [];
        foreach ($results as $i => $result) {
            $filters[$i]['name'] = $result['name'];
            $filters[$i]['id'] = $result['id'];
        }

        return $filters;
    }
}