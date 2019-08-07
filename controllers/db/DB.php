<?php

require_once dirname(__FILE__) . '/DBBuilder.php';

class DB {

    public static function connect($db) {

        return new DBBuilder($db);
    }
}