<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new \autoload\Autoloader(), 'loadClass']);

$db = new \database\Db();

$product = new \models\Product(new \database\Db());
var_dump($product);
var_dump($db);
//$model = new \models\Model;
//var_dump($model);