<?php


namespace models;


class Model
{
    /**
     * @var
     */
    private $db;
    protected $tableName;

    /**
     * Product constructor.
     * @param \database\Db $db
     */
    public function __construct()
    {
        $this->db = new \database\Db();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {this->tableName}";
        return $this->db->queryAll($sql);

    }
}