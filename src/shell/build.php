<?php
/**
 * Shell startup file for build tools.
 *
 * Used ../bootstrap.php file for configuration.
 */

    define ('DS', DIRECTORY_SEPARATOR);
    define ('ISM_NS', 'ISM');

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

    $source = realpath($src);
    if (empty($source)) {
        echo "ERROR. Wrong source path => " . $src . PHP_EOL;
        exit();
    }
    $target = realpath($trg);
    if (empty($target)) {
        echo "ERROR. Wrong target path => " . $trg . PHP_EOL;
        exit();
    }

    echo "Source file : " . '['. $source . ']' .PHP_EOL;

    $newMethods = array();
    $handle = fopen($source, "r");

    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $matches = array();
            $result = preg_match('~public function (.*) {~', $line, $matches);
            if ($result) {
                $newMethods[] = " * @method \\ISM\\BasePage " . $matches[1];
            }
            unset($matches);
        }
    } else {
        echo "Error in open file " . $source;
        die();
    }
    fclose($handle);

    echo "Target file : " . '['. $target . ']' .PHP_EOL;

    $handleTarget = fopen($target, "r");

    if ($handleTarget) {
        $beginProxiedGenerateAutoBlock = false;
        $endProxiedGenerateAutoBlock = false;
        $lines = array();

        while (($line = fgets($handleTarget)) !== false) {
            $matches = array();

            if ( $beginProxiedGenerateAutoBlock ) {
                $resultEnd = preg_match('~# autogenerated-proxied-methods-end~', $line, $matches);
                if ($resultEnd) {
                    $beginProxiedGenerateAutoBlock = false;
                }
            }

            if ( !$beginProxiedGenerateAutoBlock ) {
                $resultBegin = preg_match('~# autogenerated-proxied-methods-start~', $line, $matches);
                if ($resultBegin) {
                    $lines[] = $line;
                    $beginProxiedGenerateAutoBlock = true;
                    foreach($newMethods as $method) {
                        $lines[] = $method . PHP_EOL;
                    }
                }
            }

            if ( $beginProxiedGenerateAutoBlock == false ) {
                $lines[] = $line;
            }

            unset($matches);
        }
    } else {
        echo "Error in open file " . $target;
        die();
    }

    fclose($handleTarget);

    $handleTarget = fopen($target, "w");

    if ($handleTarget) {
        $countLines = 0;
        foreach($lines as $line) {
            fputs($handleTarget, $line);
            $countLines++;
        }
        echo "Write to target {$countLines} lines" . PHP_EOL;
    }

    fclose($handleTarget);