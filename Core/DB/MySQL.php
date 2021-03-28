<?php

namespace Core\DB;

class MySQL
{
    private static $_instance;

    private function __construct()
    {

    }

    public static function getInstance(): \mysqli
    {
        if (self::$_instance === null) {
            self::$_instance = new \mysqli('mysql', 'root', 'root', 'agis1');
        }
        return self::$_instance;
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    public function __sleep()
    {
    }
}
