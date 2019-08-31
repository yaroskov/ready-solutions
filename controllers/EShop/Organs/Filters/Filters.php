<?php
namespace Controllers\EShop\Organs\Filters;

class Filters
{
    protected $filters;

    public function __construct()
    {
        $this->filters = [
            'devices' => ['title' => 'Device'],
            'models' => ['title' => 'Model'],
            'colors' => ['title' => 'Color'],
        ];
    }

    private function prepareSelectedFilters($data)
    {
        foreach ($this->filters as $key => $filter) {

            if (isset($data[$key])) {
                $this->filters[$key]['selected'] = $data[$key];
            }
        }
    }

    public function run()
    {
        foreach ($this->filters as $key => $filter) {

            $this->filters[$key]['selected'] = ['name' => '', 'id' => ''];
        }

        $this->filters['devices']['data'] = FiltersGetter::devices();

        if (isset($_GET['data'])) {

            $this->prepareSelectedFilters($_GET['data']);

            $filtersData = new FiltersData($_GET['data']);

            if ($filtersData->getDevicesId()) {

                $this->filters['models']['data'] = FiltersGetter::models($filtersData->getDevicesId());

                if ($filtersData->getModelsId()) {

                    $this->filters['colors']['data'] = FiltersGetter::colors($filtersData->getModelsId());
                }
            }
        }

        return $this->filters;
    }
}