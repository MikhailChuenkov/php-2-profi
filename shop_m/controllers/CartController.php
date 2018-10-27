<?php


namespace app\controllers;

use app\models\Cart;
use app\models\repositories\CartRepository;
use app\models\repositories\ProductRepository;

class CartController extends Controller
{
    public function actionIndex()
    {
        $model = [];
        echo $this->render("myCart", ['model' => $model]);
    }

    public function actionAddProductToBasket(){
        $id = $_POST['buybtn'];
        $selectProduct = (new ProductRepository())->getOne($id);

        $productToBasket = new Cart();
        $productToBasket->productId = $selectProduct->id;
        $productToBasket->productName = $selectProduct->title;
        $productToBasket->productCount = 1;
        $productToBasket->productSumm = $selectProduct->price;
        (new CartRepository())->save($productToBasket);

    }

}