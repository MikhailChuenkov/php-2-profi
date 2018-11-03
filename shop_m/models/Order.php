<?php


namespace app\models;

use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductRepository;
use app\base\App;

class Order extends DataEntity
{
    public $idUser;
    public $id;
    public $orderSumm;

    public function AddToOrders(){

        $this->idUser = 4;
        $order = new OrdersRepository();

        $session = App::call()->session;
        $session->setSessionBasket();
        $basket = $session->getSessionBasket();

        $product = new ProductRepository();

        $orderSumm = 0;
        foreach ($basket as $key => $count){
            $orderSumm += ($product->getOne($key))->price * $count;
        }
        $this->orderSumm = $orderSumm;

        $order->insert($this);

    }
}