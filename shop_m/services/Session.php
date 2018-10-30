<?php


namespace app\services;



class Session
{

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

    public function delProductFromBasket($id)
    {
        unset($_SESSION['basket'][$id]);
    }


}