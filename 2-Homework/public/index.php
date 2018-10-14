<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

$db = new \app\database\Db();

$product = new \app\models\Product($db);
var_dump($product);
var_dump($db);
//$model = new \models\Model;
//var_dump($model);