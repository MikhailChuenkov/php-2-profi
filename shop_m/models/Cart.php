<?php


namespace app\models;


class Cart extends DataEntity
{
    public $idUser;
    public $productId;
    public $productName;
    public $productCount;
    public $productSumm;


    public function getTableName()
    {
        return 'basket';
    }
}