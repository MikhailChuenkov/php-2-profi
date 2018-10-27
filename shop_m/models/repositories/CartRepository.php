<?php


namespace app\models\repositories;

use app\models\Cart;

class CartRepository extends Repository
{
    public function getTableName()
    {
        return 'basket';
    }

    public function getEntityClass()
    {
        return Cart::class;
    }

}