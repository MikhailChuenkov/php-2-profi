<?php

namespace autoload;

class Autoloader
{

    public function loadClass($className)
    {
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$className}.php";
        include $filename;

    }

}