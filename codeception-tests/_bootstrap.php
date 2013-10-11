<?php
// This is global bootstrap for autoloading
define ('DS', DIRECTORY_SEPARATOR);
define ('ISM_NS', 'ISM');
$localAppDirPrefix = __DIR__. DS. 'local'. DS . 'app' . DS . ISM_NS;
Codeception\Util\Autoload::register(ISM_NS, 'Page', $localAppDirPrefix);
Codeception\Util\Autoload::register(ISM_NS, 'Pages', $localAppDirPrefix);
Codeception\Util\Autoload::register(ISM_NS.'\\Intface', 'Intface', $localAppDirPrefix.DS.'Intface');