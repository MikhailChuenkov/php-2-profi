<?php


namespace app\models;

use app\base\App;
use app\models\repositories\ProductRepository;
use app\services\Request;

class Cart extends DataEntity
{
    public $productId;
    public $productName;
    public $productCount;
    public $productSumm;

    public $productsFromCartArray;
    public $summBasket;


    public function getBasket(){
        $productRepository = new ProductRepository();

        $productCount = $this->getData();

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

        $this->productsFromCartArray = $productsFromCartArray;
        $this->productCount = $productCount;
        $this->productSumm = $productSumm;
        $this->summBasket = $summBasket;
    }

    public function addToBasket(){

        $productBuyId = new Request();
        $id =$productBuyId->post('buybtn');

        $session = App::call()->session;
        $session->setSessionBasket();
        $productCount = $session->getSessionBasket();

        $selectProduct = (new ProductRepository())->getOne($id);

        if(isset($productCount[$selectProduct->id])){
            $session->setIncProductCount($selectProduct->id);
        }else{
            $session->setProductCount($selectProduct->id);
        }
    }

    public function delProductFromBasket(){
        $productBuyId = new Request();
        $id =$productBuyId->post('delProduct');

        $session = App::call()->session;
        $session->delProductFromBasket($id);
    }

    private function getData(){
        //$session = Session::getInstance();
        $session = App::call()->session;
        $session->setSessionBasket();
        return $session->getSessionBasket();
    }
}