<?php
namespace Controllers\EShop\Organs\Filters;

class FiltersData
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getDevicesId()
    {
        return $this->data['devices']['id'];
    }

    public function getModelsId()
    {
        return $this->data['models']['id'];
    }
}