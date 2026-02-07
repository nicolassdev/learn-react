<?php
// backend/System/Main.php

namespace backend\System;

use MysqliDb;

class Main extends MysqliDb
{
    public function __construct($initDb = true)
    {
        if ($initDb) {
            // MysqliDb needs config array DIRECTLY from database.php
            $config = require __DIR__ . '/../config/database.php';
            parent::__construct([
                'host'      => $config['host'],
                'username'  => $config['username'],
                'password'  => $config['password'],
                'db'        => $config['database'],
                'charset'   => $config['charset'],
                'prefix'    => $config['prefix']
            ]);
        }
    }
}
