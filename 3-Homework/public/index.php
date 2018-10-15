<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

//$db = new \app\database\Db();
//$db->getConnection();
$product = new \app\models\Product();
var_dump($product->getOne(1));
//var_dump($product);
//var_dump($db->prepearDsnString());
//$model = new \models\Model;
//var_dump($model);