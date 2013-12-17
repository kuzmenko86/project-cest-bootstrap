<?php
/**
 * Shell startup file for build tools.
 *
 * Used ./bootstrap.php file for configuration.
 */

    use \ISM\Tool\CommCompositionTool;
    define ('DS', DIRECTORY_SEPARATOR);
    define ('ISM_NS', 'ISM');

    $autoladerFile = realpath(__DIR__ . DS . "autoloader.php");
    require_once($autoladerFile);

    $bootstrapFile = realpath(__DIR__ . DS . "bootstrap.php");
    require_once($bootstrapFile);
    /**
     * Load this parameters from $bootstrapFile.
     * @var string $codeceptTestsDir
     * @var string $testsArea
     * @var string $guyFile
     */

    $localAppISM = __DIR__ . DS . ".." . DS . 'app' . DS . ISM_NS;

    $src = __DIR__ . DS . ".." . DS . ".." . DS . $codeceptTestsDir . DS . $testsArea . DS . $guyFile;
    $trg = $localAppISM . DS . "AbstractPage.php";

    $c = new CommCompositionTool();
    $c[] = 'CommBuild';

    if (! $c[0]->setSource($src)) {
        exit();
    }
    if (! $c[0]->setTarget($trg)) {
        exit();
    }
    $c[0]->execute();
    exit();
