<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\services\Session;
use app\services\Request;
use app\models\Cart;
use app\controllers\ProductController;

class CartController extends Controller
{
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
    public function actionAddProductToBasket()
    {
        (new Cart())->addToBasket();
        $this->actionRedirectToProduct();
    }


    public function actionDelProductFromBasket()
    {
        (new Cart())->delProductFromBasket();
        $this->actionRedirectToProduct();
    }
}