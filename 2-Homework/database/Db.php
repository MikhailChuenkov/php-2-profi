<?php

namespace app\database;

class Db implements IDb
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop_m',
        'charset' => 'utf8',
    ];

    protected $conn = null;

    private function getConnection(){
        if(is_null($this->conn)){
            $this->conn = new \PDO();
        }
        return $this->conn;
    }

    public function queryOne(string $sql): array
    {
        return [];
    }
    public function queryAll(string $sql): array
    {
        return [];
    }

}