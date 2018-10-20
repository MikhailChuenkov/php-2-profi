<?php


namespace app\models;

use app\database\Db;

abstract class DataModel implements IModel
{

    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }


    public static function getOne($id)
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], get_called_class());
    }

    public static function getAll()
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return Db::getInstance()->queryAll($sql);

    }

    public function delete()
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
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

    public function insert()
    {
        $colums = [];
        $params = [];
        foreach ($this as $key => $value) {
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

    public function update()
    {

        foreach ($this as $key => $value) {
            $table = $this->getTableName();
            if (gettype($value) == 'object') {
                continue;
            }
            if ($key != "id" && !(is_null($value))) {
                $params = [];
                $params[":{$key}"] = $value;
                $placeholder = ":{$key}";
                $sql = "UPDATE {$table} SET {$key} = {$placeholder} WHERE id = {$this->id}";
                $this->db->execute($sql, $params);
            }
        }

    }

    public function save()
    {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

}