<?php


namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderProducts;
use app\models\repositories\ProductRepository;
use app\models\repositories\OrderProductsRepository;
use app\models\repositories\OrdersRepository;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $cart = new Cart();
        $cart->getBasket();

        echo $this->render("myCart", [
            'productsFromCartArray' => $cart->productsFromCartArray,
            'productCount' => $cart->productCount,
            'productSumm' => $cart->productSumm,
            'summBasket' => $cart->summBasket
        ]);
    }

    public function actionRedirectToProduct()
    {
        $productRepository = new ProductRepository();
        $model = $productRepository->getAll();

        $cart = new Cart();
        $cart->getBasket();

        //Product::getAll();
        echo $this->render("products", [
            'model' => $model,
            'productsFromCartArray' => $cart->productsFromCartArray,
            'productCount' => $cart->productCount,
            'productSumm' => $cart->productSumm,
            'summBasket' => $cart->summBasket
        ]);

    }

    public function actionAddOrderOld()
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
        $this->actionIndex();
    }

    public function actionAddOrder(){
        (new Order())->AddToOrders();

        $orderProducts = new OrderProducts();

        $orderProducts->AddToOrderProducts();

        $orderProducts->ClearBasket();

        $this->actionRedirectToProduct();
    }

}