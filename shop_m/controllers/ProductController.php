<?php


namespace app\controllers;

use app\models\repositories\ProductRepository;
use app\models\repositories\CartRepository;
use app\services\Request;
use app\services\Session;
class ProductController extends Controller
{



    public function actionIndex()
    {
        $productRepository = new ProductRepository();
        $model = $productRepository->getAll();

        $session = Session::getInstance();
        $session->setSessionBasket();
        $productCount = $session->getSessionBasket();
        //unset($_SESSION['basket']['']);
        //var_dump($_SESSION['basket']);

        $productSumm = [];
        $productsFromCartArray = [];
        $summBasket = 0;
        if(!empty($productCount)){
            $productIds = array_keys($productCount);
            for ($i = 0; $i < count($productIds); $i++){
                $product = $productRepository->getOne($productIds[$i]);
                $productsFromCartArray[] = $product;
                $productSumm[$productIds[$i]] = $product->price * $productCount[$productIds[$i]];
                $summBasket += $productSumm[$productIds[$i]];
            }

        }
            //Product::getAll();
        echo $this->render("products", [
            'model' => $model,
            'productsFromCartArray' => $productsFromCartArray,
            'productCount' => $productCount,
            'productSumm' => $productSumm,
            'summBasket' => $summBasket
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