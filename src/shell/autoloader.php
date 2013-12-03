<?php

spl_autoload_register('app_auto_loader');

function app_auto_loader($library, $param = null)
{
    $libPath = str_replace('\\', DS , $library);
    $fullLibPath = realpath(__DIR__ . DS . '..' . DS . 'app' . DS . $libPath . '.php');
    if (file_exists($fullLibPath)) {
        include_once($fullLibPath);
    }

}