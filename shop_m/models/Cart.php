<?php


namespace app\models;


class Cart extends DataEntity
{
    public $productId;
    public $productName;
    public $productCount;
    public $productSumm;
}