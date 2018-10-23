<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends Controller
{



    public function actionIndex()
    {
        $model = Product::getAll();
        echo $this->render("products", ['model' => $model]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $model = Product::getOne($id);
        echo $this->render("product", ['model' => $model]);

    }

}