<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

//$db = new \app\database\Db();
//$db->getConnection();
$product = new \app\models\Product();
/*$product->title = 'Watch1';
$product->price = 987;
$product->photo = 'watch.jpg';*/
$product->id = 5;
var_dump($product->getAll());
