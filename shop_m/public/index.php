<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";
//include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";
spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
/*
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

var_dump($_SERVER);
*/


//var_dump($_SESSION['basket']);
try {
    $request = new \app\services\Request();
    $controllerName = $request->getControllerName()?: DEFAULT_CONTROLLER;
    $actionName = $request->getActionName();

}catch (\Exception $e){
    $controllerName = "error";
} finally {
}

$controllerClass = CONTROLLER_NAMESPACE . "\\" . ucfirst($controllerName) . "Controller";

//$controllerName = $_GET['c'] ?: DEFAULT_CONTROLLER;
//$actionName = $_GET['a'];

if (class_exists($controllerClass)){
    $controller = new $controllerClass(
        new \app\services\renderers\TemplateRenderer()
        //new \app\services\renderers\TwigRenderer()
    );
    $controller->run($actionName);
}
/*
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['buybtn']) {
        $controllerClass = CONTROLLER_NAMESPACE . "\\" . "CartController";
        $actionName = "addProductToBasket";
        $controller = new $controllerClass(
            new \app\services\renderers\TemplateRenderer()
        );
        $controller->run($actionName);
    }
    if($_POST['checkoutbtn']){
        $controllerClass = CONTROLLER_NAMESPACE . "\\" . "OrderController";
        $actionName = "addOrder";
        $controller = new $controllerClass(
            new \app\services\renderers\TemplateRenderer()
        );
        $controller->run($actionName);
    }
}
*/