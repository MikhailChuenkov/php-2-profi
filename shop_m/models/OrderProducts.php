<?php


namespace app\models;


use app\models\repositories\OrderProductsRepository;
use app\models\repositories\OrdersRepository;
use app\base\App;
use app\models\repositories\ProductRepository;

class OrderProducts extends DataEntity
{
    public $orderId;
    public $productId;
    public $productName;
    public $productCount;
    public $productSumm;
    public $orderSumm;

    public function AddToOrderProducts(){

        $product = new ProductRepository();
        $orderProducts = new OrderProductsRepository();
        $order = new OrdersRepository();
        $lastOrder = $order->getOneForLastInsertId();
        $lastOrderId = $lastOrder->id;
        $lastOrderSumm = $lastOrder->orderSumm;
        $this->orderId = $lastOrderId;

        $session = App::call()->session;
        $session->setSessionBasket();
        $basket = $session->getSessionBasket();

        foreach ($basket as $key => $count){
            $this->productId = $key;
            $this->productName = ($product->getOne($key))->title;
            $this->productCount = $count;
            $this->productSumm = ($product->getOne($key))->price * $count;
            $this->orderSumm = $lastOrderSumm;
            $orderProducts->insert($this);
        }
    }

    public function ClearBasket(){
        $session = App::call()->session;
        $session->clearSessionBasket();
    }
}