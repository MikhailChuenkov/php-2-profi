<?php


namespace app\database;


interface IDb
{
    public function queryOne(string $sql);

    public function queryAll(string $sql);
}