<?php
namespace Controllers\DB;

class DB {

    public static function connect($db) {

        return new DBBuilder($db);
    }
}