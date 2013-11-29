<?php
// This is global bootstrap for autoloading
define ('DS', DIRECTORY_SEPARATOR);
define ('ISM_NS', 'ISM');
$localAppDirPrefix = __DIR__. DS. '..' . DS .'src'. DS . 'app' . DS . ISM_NS;
$localAppDirPrefix = realpath($localAppDirPrefix);
Codeception\Util\Autoload::register(ISM_NS, 'Page', $localAppDirPrefix);
Codeception\Util\Autoload::register(ISM_NS, 'Factory', $localAppDirPrefix.DS.'Factory');
Codeception\Util\Autoload::register(ISM_NS.'\\Intface', 'Intface', $localAppDirPrefix.DS.'Intface');