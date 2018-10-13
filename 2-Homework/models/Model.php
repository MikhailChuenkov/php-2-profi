<?php


namespace models;


abstract class Model implements IModel
{
    /**
     * @var
     */
    private $db;

    /**
     * Product constructor.
     * @param \database\Db $db
     */
    public function __construct(\database\IDb $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        return $this->db->queryAll($sql);

    }

}