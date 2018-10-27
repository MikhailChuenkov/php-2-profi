<?php


namespace app\models;


class OrderProducts extends DataEntity
{
    public $orderId;
    public $productId;
    public $productName;
    public $productCount;
    public $productSumm;
    public $orderSumm;
}