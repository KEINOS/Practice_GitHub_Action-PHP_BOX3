<?php
namespace KEINOS\Sample;

function includeIfExists($file)
{
    return file_exists($file) ? include $file : false;
}

if ((!$loader = includeIfExists(__DIR__ . '/../vendor/autoload.php')) && (!$loader = includeIfExists(__DIR__ . '/vendor/autoload.php'))) {
    echo 'You must set up the project dependencies using composer. Ex.) $ composer install'
        . PHP_EOL .
        'See https://getcomposer.org/download/ for instructions on installing Composer'
        . PHP_EOL;
        echo 'DIR: ' . __DIR__ . PHP_EOL;
        print_r(\scandir(__DIR__));
    exit(1);
}

require_once \dirname(__DIR__) . '/vendor/autoload.php';

$parrotry = new Sample();

echo $parrotry->saySomethingTo('KEINOS'), PHP_EOL;
