<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";

spl_autoload_register([new Autoloader(), 'loadClass']);

//$db = new Db();

$product = new Product();
var_dump($product);
//var_dump($db);