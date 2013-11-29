<?php
/**
 * Bootstrap configuration file for shell tools.
 */

if (! defined('DS') ) {
    define ('DS', DIRECTORY_SEPARATOR);
}

//set default value
$codeceptTestsDir = 'codeception-tests';
$testsArea = 'acceptance';
$guyFile = "WebGuy.php";

$configYaml = array();

// try load configuration from yaml file
// required yaml
// see http://www.php.net/manual/en/function.yaml-parse.php
if (function_exists('yaml_parse')) {
    $configYamlFile = __DIR__ . DS . '..' . DS . 'codeception.yml';
    $yamlContent = file_get_contents($configYamlFile);
    $configYaml = yaml_parse($yamlContent);
} else {
    echo "WARNING. I can not load configuration from codeception.yml" . PHP_EOL;
    echo "Please install php-yaml with pecl : sudo pecl install yaml" . PHP_EOL;
    echo "Try to use default values." . PHP_EOL;
}

if ( count($configYaml)>0 and isset($configYaml['paths']['tests'])) {
    $codeceptTestsDir = $configYaml['paths']['tests'];
}

echo "========== [CONFIG] ===========" . PHP_EOL;
echo "Codeception tests folder => " . $codeceptTestsDir . PHP_EOL;
echo "Tests area folder        => " . $testsArea . PHP_EOL;
echo "Source guy file          => " . $guyFile . PHP_EOL;
echo "===============================" . PHP_EOL;

