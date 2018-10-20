<?php


namespace app\models;


class Order extends DataModel
{
    public $idOrder;
    public $idUser;


    public static function getTableName()
    {
        return 'order';
    }
}