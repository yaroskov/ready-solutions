<?php

class Filters {

    protected $filters;

    public function __construct()
    {
        $this->filters = [
            'devices' => ['title' => 'Device', 'selected' => ['name' => '', 'id' => '']],
            'models' => ['title' => 'Model', 'selected' => ['name' => '', 'id' => '']],
            'colors' => ['title' => 'Color', 'selected' => ['name' => '', 'id' => '']],
        ];
    }

    public function single($key, $query)
    {
        $results = DB::connect(DB['eShop'])->query($query);

        foreach ($results as $i => $result) {
            $this->filters[$key]['data'][$i]['name'] = $result['name'];
            $this->filters[$key]['data'][$i]['id'] = $result['id'];
        }
    }

    public function run()
    {
        $this->single('devices', 'SELECT * FROM `devices_types`');

        if (isset($_GET['data'])) {

            $data = $_GET['data'];

            foreach ($this->filters as $key => $filter) {

                if (isset($data[$key])) {
                    $this->filters[$key]['selected'] = $data[$key];
                }
            }

            if ($data['devices']['id']) {

                $this->single('models', 'SELECT * FROM `models` WHERE `devices_types_id` = ' . $data['devices']['id']);

                if ($data['models']['id']) {

                    $query = "SELECT `colors`.`name`, `colors`.`products_count_id`, `colors`.`id` FROM `colors` " .
                        "INNER JOIN `products_count` " .
                        "ON `products_count`.`id` = `colors`.`products_count_id` " .
                        "INNER JOIN `models` " .
                        "ON `models`.`id` = `products_count`.`models_id` " .
                        "WHERE `products_count`.`models_id` = " . $data['models']['id'];

                    $this->single("colors", $query);
                }
            }
        }

        return $this->filters;
    }
}