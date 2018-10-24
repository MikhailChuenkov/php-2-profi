<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";
//Twig_Autoloader::register();
//spl_autoload_register([new \app\autoload\Autoloader(), 'loadClass']);

try {
// Указывает, где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/../views");
// Инициализируем Twig
    $twig = new Twig_Environment($loader);
// Подгружаем шаблон
    $template = $twig->loadTemplate('thanks.tmpl');
// Передаем в шаблон переменные и значения
// Выводим сформированное содержание
    echo $template->render(array(
        'name' => 'Clark Kent',
        'username' => 'ckent',
        'password' => 'krypt0n1te',
    ));
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}


$product = \app\models\Product::getOne(8);
//$product->id = "8";
//$product = $product->getOne(8);
//$product->title = "Dress";
//$product->price = "53";
//$product->id = "8";
//$product->photo = "sweater21.jpg";
var_dump($product);
//$product->save();
/*
$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)){
    $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
    $controller->run($actionName);
}
*/
