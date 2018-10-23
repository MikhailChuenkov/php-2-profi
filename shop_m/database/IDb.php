<?php


namespace app\database;


interface IDb
{
    public function queryOne(string $sql, array $params);
    public function queryAll(string $sql, array $params);
    public function execute(string $sql, array $params);
}