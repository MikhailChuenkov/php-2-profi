<?php


namespace app\controllers;


class ErrorController extends Controller
{
    public function actionIndex()
    {
        $this->useLayout = false;
        echo $this->render("error", ['']);

    }
}