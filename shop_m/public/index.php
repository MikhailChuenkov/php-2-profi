<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

$product = new \app\models\Product();
$product->id = "8";
$product->title = "Sweater new";
$product->photo = "Sweater.jpg";
var_dump($product);
$product->update();