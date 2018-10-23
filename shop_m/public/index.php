<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

$product = \app\models\Product::getOne(8);
//$product->id = "8";
//$product = $product->getOne(8);
//$product->title = "Dress";
//$product->price = "53";
//$product->id = "8";
$product->photo = "sweater21.jpg";
//var_dump($product);
$product->save();

$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
    $controller->run($actionName);
}
