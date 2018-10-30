<?php

namespace app\models\repositories;

use app\models\DataEntity;
use app\database\Db;

abstract class Repository implements IRepository
{
    private $db;

    public function __construct()
    {
        $this->db = static::getDb();
    }


    private static function getDb()
    {
        return Db::getInstance();
    }

    public function getOne($id)
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return static::getDb()->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return static::getDb()->queryAll($sql);

    }

    public function delete(DataEntity $entity)
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $entity->id]);
    }

    public function sendProduct()
    {
        $table = $this->getTableName();
        $sql = "INSERT INTO {$table} (title, price, photo) VALUE (:title, :price, :photo)";
        return $this->db->queryOne($sql, [
            ':title' => $this->title,
            ':price' => $this->price,
            ':photo' => $this->photo,
        ]);
    }

    public function updateProductCount()
    {
        $table = $this->getTableName();
        $sql = "UPDATE {$table} SET productCount = :productCount";
        return $this->db->queryOne($sql, [
            ':productCount' => $this->productCount,
        ]);
    }

    public function insert(DataEntity $entity)
    {
        $colums = [];
        $params = [];
        foreach ($entity as $key => $value) {
            if (gettype($value) == 'object') {
                continue;
            }
            $params[":{$key}"] = $value;
            $colums[] = "{$key}";
        }
        $colums = implode(", ", $colums);
        $placeholders = implode(", ", array_keys($params));
        $table = $this->getTableName();
        $sql = "INSERT INTO {$table} ({$colums}) VALUE ({$placeholders})";
        //var_dump($params);
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function update(DataEntity $entity)
    {
        $stringSql = "";
        $params = [];
        $table = $this->getTableName();
        foreach ($entity as $key => $value) {

            if (gettype($value) == 'object') {
                continue;
            }
            if ($key != "id" && !(is_null($value))) {

                $params[":{$key}"] = $value;
                $placeholder = ":{$key}";
                $stringSql .= "{$key} = {$placeholder}, ";
            }
        }
        $stringSql = substr($stringSql, 0, strlen($stringSql) - 2);

        $sql = "UPDATE {$table} SET {$stringSql} WHERE id = {$entity->id}";
        $this->db->execute($sql, $params);
    }

    public function save(DataEntity $entity)
    {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }

    public function find($sql, $params)
    {
        return $this->db->queryObject($sql, $params, $this->getEntityClass());
    }

}