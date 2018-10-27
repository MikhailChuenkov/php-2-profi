<?php


namespace app\controllers;

//use app\models\Product;
use app\models\repositories\ProductRepository;
use app\models\repositories\CartRepository;
use app\services\Request;

class ProductController extends Controller
{



    public function actionIndex()
    {
        $model = (new ProductRepository())->getAll();
        $productsFromCart = (new CartRepository())->getAll();
            //Product::getAll();
        echo $this->render("products", [
            'model' => $model,
            'productsFromCart' => $productsFromCart
        ]);
/*
        $entity = new Product();
        $entity->title = "glasses";
        $entity->price = 124;
        $entity->photo = "glasses.jpg";
        (new ProductRepository())->save($entity);
*/
    }

    public function actionCard()
    {
        //$this->useLayout = false;
        //$id = $_GET['id'];
        $id = (new Request())->get('id');
        $model = (new ProductRepository())->getOne($id);
            //Product::getOne($id);
        echo $this->render("product", ['model' => $model]);

    }



}