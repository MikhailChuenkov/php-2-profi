<?php


namespace app\database;


interface IDb
{
    public function queryOne(string $sql): array;

    public function queryAll(string $sql): array;
}