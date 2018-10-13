<?php

//namespace autoload;

class Autoloader
{
    private $dirs = [
        'models',
        'services',
    ];

    public function loadClass($className)
    {
        /*$filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$className}.php";
        include $filename;*/
        foreach ($this->dirs as $dir) {
            $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$dir}/{$className}.php";
            var_dump($filename);
            if (file_exists($filename)) {
                include $filename;
                break;
            }
        }
    }
        /*
    private $dirs = [
        'models',
        'services',
    ];
        foreach ($this->dirs as $dir) {
            $filename = $_SERVER['DOCUMENT_ROOT'] . "/../{$className}.php";
            var_dump($filename);
            if (file_exists($filename)) {
                include $filename;
                break;
            }
        }
    }
        */
}