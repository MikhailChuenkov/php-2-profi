<?php


namespace app\controllers;


class CartController extends Controller
{
    public function actionIndex()
    {
        $model = [];
        echo $this->render("myCart", ['model' => $model]);;
    }
}