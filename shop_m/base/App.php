<?php


namespace app\base;
use app\traits\TSingleton;

/**
 * Class App
 * @package app\base
 * @property $db;
 * @property $request;
 * @property $session;
 */

class App
{
    use TSingleton;

    public static function call(){
        return static::getInstance();
    }

    public $config;

    private $components;

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    private function runController()
    {

        try {
            $controllerName = $this->request->getControllerName() ?: $this->config['defaultController'];
            $actionName = $this->request->getActionName();

        } catch (\Exception $e) {
            $controllerName = "error";
        } finally {
        }

        $controllerClass = $this->config['controllerNamespace'] . "\\" . ucfirst($controllerName) . "Controller";
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );
            $controller->run($actionName);
        }
    }

    public function createComponents($key){
        if($this->config['components'][$key]){
            $params = $this->config['components'][$key];
            $class = $params['class'];
            if (class_exists($class)){
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }else{
                throw new\Exception("Не определен класс компонента");
            }
        }else{
            throw new \Exception("Компонент $key не найден");
        }
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }


}