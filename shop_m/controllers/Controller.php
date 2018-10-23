<?php


namespace app\controllers;


use app\services\renderers\IRenderer;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $renderer = NULL;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer =  $renderer;
    }


    public function run($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo 'Нет такого метода';
        }
    }


    public function render($template, $params = []){
        if($this->useLayout){
            $content = $this->renderTemplate($template, $params);
            return $this->renderTemplate("Layout/" . $this->layout, ['content' => $content]);
        }
        return $this->renderTemplate($template, $params);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->render($template, $params);

    }

}