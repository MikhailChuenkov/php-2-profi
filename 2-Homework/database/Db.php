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
        'charset' => 'utf8'
    ];

    protected $conn = null;

    public function getConnection()
    {
        var_dump($this->prepareDsnString());
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            //$this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        var_dump($this->conn);
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

    private function prepareDsnString(): string
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

}