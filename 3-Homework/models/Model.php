<?php


namespace app\models;

use app\database\Db;
abstract class Model implements IModel
{

    private $db;

    public function __construct(){
        $this->db = Db::getInstance();
    }
    private function __clone(){}
    private function __wakeup(){}

    /**
     * @return static
     */
    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function getOne($id)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll()
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        var_dump($sql);
        return $this->db->queryAll($sql);

    }

}