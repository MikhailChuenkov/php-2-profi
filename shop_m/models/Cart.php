<?php


namespace app\models;


class Cart extends DataModel
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