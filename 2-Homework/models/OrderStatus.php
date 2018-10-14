<?php


namespace app\models;


class OrderStatus extends Order
{
    public $new;
    public $approved;
    public $received;
    public $canceled;
    public function canseled(){
        // Отменить заказ
    }
}