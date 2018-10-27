<?php


namespace app\models\repositories;

use app\models\OrderProducts;

class OrderProductsRepository extends Repository
{
    public function getTableName()
    {
        return 'orderProducts';
    }

    public function getEntityClass()
    {
        return OrderProducts::class;
    }
}