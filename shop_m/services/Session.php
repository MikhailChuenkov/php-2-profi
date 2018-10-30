<?php


namespace app\services;


use app\traits\TSingleton;

class Session
{
    use TSingleton;

    public $selectBasket;
    public $selectIncProductCount;

    public function __construct()
    {
        session_start();
    }

    public function setSessionBasket()
    {
        $this->selectBasket = $_SESSION['basket'];
    }

    public function getSessionBasket()
    {
        return $this->selectBasket;
    }

    public function setIncProductCount($id)
    {
        $_SESSION['basket'][$id]++;
    }

    public function setProductCount($id)
    {
        $_SESSION['basket'][$id] = 1;
    }



}