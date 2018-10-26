<?php


namespace app\models;


class Order extends DataEntity
{
    public $idOrder;
    public $idUser;


    public static function getTableName()
    {
        return 'order';
    }
}