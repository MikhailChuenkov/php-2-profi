<?php

namespace app\autoload;

class Autoloader
{
    public function loadClass($className)
    {
        $className = str_replace(["app\\"], [$_SERVER['DOCUMENT_ROOT'] . "/../"], $className);
        $className .= ".php";
        if (file_exists($className)){
            include $className;
        }
    }
}