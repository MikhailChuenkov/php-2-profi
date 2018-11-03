<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\models\Cart;

class CartController extends Controller
{
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