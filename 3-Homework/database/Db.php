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

    protected static $instance = NULL;
    private function __construct()
    {
    }

    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function getConnection()
    {
        var_dump($this->prepareDsnString());
        if (is_null($this->conn)) {
            /*$this->conn = mysqli_connect(
                $this->config['host'],
                $this->config['login'],
                $this->config['password'],
                $this->config['database']
            );*/

            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );

            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        var_dump($this->conn);
        return $this->conn;
    }

    /*
        public function getConnection()
        {
            try {
                if (is_null($this->conn)) {
                    $this->conn = new \PDO(
                        $this->prepareDsnString(),
                        $this->config['login'],
                        $this->config['password'],
                        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING)
                    );
                }
                return $this->conn;
            } catch (\PDOException $e) {
                echo 'Соединение оборвалось: ' . $e->getMessage();
                exit;
            }
        }
        */

    public function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $id = 1;
        /*$pdoStatement->bindParam(":id",$id,\PDO::PARAM_INT);
        $pdoStatement->execute();*/
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params)
{
        $this->query($sql, $params);
}

    private function prepareDsnString(): string
    {
        //mysql:host=$host;dbname=$db;charset=$charset
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

}