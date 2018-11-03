<?php


namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderProducts;
use app\models\repositories\ProductRepository;

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

        echo $this->render("products", [
            'model' => $model,
            'productsFromCartArray' => $cart->productsFromCartArray,
            'productCount' => $cart->productCount,
            'productSumm' => $cart->productSumm,
            'summBasket' => $cart->summBasket
        ]);

    }

    public function actionAddOrder(){
        (new Order())->AddToOrders();

        $orderProducts = new OrderProducts();

        $orderProducts->AddToOrderProducts();

        $orderProducts->ClearBasket();

        $this->actionRedirectToProduct();
    }

    public function actionDelProductFromBasket()
    {
        (new Cart())->delProductFromBasket();
        $this->actionIndex();
    }

}