<?php

class DBBuilder
{
    public $link;
    public $connectionError = false;

    public function __construct($db)
    {
        $this->link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);

        if (!$this->link) {
            $this->connectionError = PHP_EOL;
        }
    }

    function query($query)
    {
        $results = mysqli_query($this->link, $query);

        $data = [];

        while ($row = mysqli_fetch_assoc($results)) {
            $data[] = $row;
        }

        return $data;
    }
}