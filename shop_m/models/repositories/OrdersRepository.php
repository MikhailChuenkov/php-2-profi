<?php


namespace app\models\repositories;

use app\models\Order;

class OrdersRepository extends Repository
{
    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Order::class;
    }
}