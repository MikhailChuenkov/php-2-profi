<?php


namespace app\controllers;

use app\base\App;
use app\models\Cart;
use app\models\repositories\ProductRepository;
class ProductController extends Controller
{



    public function actionIndex()
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

    public function actionCard()
    {
        //$this->useLayout = false;
        $id = App::call()->request->get('id');
        $model = (new ProductRepository())->getOne($id);
        echo $this->render("product", ['model' => $model]);

    }



}