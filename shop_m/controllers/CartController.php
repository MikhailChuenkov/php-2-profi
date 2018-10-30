<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\services\Session;

class CartController extends Controller
{
    public function actionIndexCart()
    {
        $model = [];
        echo $this->render("myCart", ['model' => $model]);
    }

    public function actionAddProductToBasket(){
        $id = $_POST['buybtn'];
        $session = Session::getInstance();
        echo 12321;
        $session->setSessionBasket();
        $productCount = $session->getSessionBasket();

        $selectProduct = (new ProductRepository())->getOne($id);
/*
        $productToBasket = new Cart();
        $productToBasket->productId = $selectProduct->id;
        $productToBasket->productName = $selectProduct->title;
        $productToBasket->productCount = 1;
        $productToBasket->productSumm = $selectProduct->price;
        (new CartRepository())->save($productToBasket);
*/
        if(isset($productCount[$selectProduct->id])){
            $session->setIncProductCount($selectProduct->id);
        }else{
            $session->setProductCount($selectProduct->id);
        }
        $this->actionIndexCart();
    }

}