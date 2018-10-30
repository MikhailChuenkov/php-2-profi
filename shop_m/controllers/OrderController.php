<?php


namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderProducts;
use app\models\repositories\CartRepository;
use app\models\repositories\OrderProductsRepository;
use app\models\repositories\OrdersRepository;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $cart = (new CartRepository())->getAll();
        echo $this->render("myCart", ['cart' => $cart]);
    }

    public function actionAddOrder()
    {
        $idUser = 3;
        $newOrder = new Order();
        $newOrder->idUser = $idUser;
        (new OrdersRepository())->save($newOrder);
        $orders = (new OrdersRepository())->getAll();
        //$cart = (new CartRepository())->getAll();
        $cart = $_SESSION['basket'];
        var_dump($cart);
        $orderProduct = new OrderProducts();

        for($i =0; $i < count($cart); $i++)
        {
        $orderProduct->orderId = count($orders);
        $orderProduct->productId = $cart[$i]['productId'];
        $orderProduct->productName = $cart[$i]['productName'];
        $orderProduct->productCount = $cart[$i]['productCount'];
        $orderProduct->productSumm = $cart[$i]['productSumm'];
        $orderProduct->orderSumm += $cart[$i]['productSumm'] * $cart[$i]['productCount'];
        (new OrderProductsRepository())->insert($orderProduct);
        }
    }

}