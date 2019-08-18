<?php

require_once dirname(__FILE__) . '/../../autoloader.php';

class DB {

    public static function connect($db) {

        return new DBBuilder($db);
    }
}