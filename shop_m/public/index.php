<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

$product = new \app\models\Product();
//$product->id = "8";
//$product = $product->getOne(8);
$product->title = "Dress";
$product->price = "53";
$product->photo = "dress.jpg";
$product->save();
var_dump($product);