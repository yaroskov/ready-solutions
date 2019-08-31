<?php
namespace Controllers\EShop\Organs\Filters\Specific\Single;

use Controllers\DB\DB;

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