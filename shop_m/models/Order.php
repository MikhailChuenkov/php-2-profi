<?php


namespace app\models;


class Order extends Model
{
    public $idOrder;
    public $idUser;


    public function getTableName()
    {
        return 'order';
    }
}