<?php

class FiltersGetter
{
    public static function devices()
    {
        $devices = new Devices();
        return $devices->getFilterData();
    }

    public static function models($devicesId)
    {
        $models = new Models();
        return $models->getFilterData($devicesId);
    }

    public static function colors($modelsId)
    {
        $models = new Colors();
        return $models->getFilterData($modelsId);
    }
}