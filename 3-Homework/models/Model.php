<?php


namespace app\models;

use app\database\Db;
abstract class Model implements IModel
{

    private $db;

    public function __construct(){
        $this->db = Db::getInstance();
    }


    public function getOne()
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $this->id]);
    }

    public function getAll()
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        return $this->db->queryAll($sql);

    }

    public function delete()
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $this->id]);
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

}