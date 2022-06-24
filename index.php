<?php

require_once __DIR__ . '/bootstrap.php';

// Load our autoloader
require_once __DIR__.'/vendor/autoload.php';

// Specify our Twig templates location
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
$twig = new \Twig\Environment($loader);

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('main');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::DEBUG));

class First{
  public function writeText(){
    return "function1";
  }
  public function wholeText(){
    return "Text of 1 class which will be in others";
  }
}

class Second extends First{
  public function writeText(){
    return "function2";
  }
}


$firstClass =  new First();
$firstClassText = $firstClass->writeText();
$firstClassWholeText = $firstClass->wholeText();
$secondClass =  new Second();
$secondClassText = $secondClass->writeText();
$secondClassWholeText = $secondClass->wholeText();


$info = [
  ['name' => $firstClassText],
  ['name' => $firstClassWholeText],
  ['name' => $secondClassText],
  ['name' => $secondClassWholeText],
];

//echo $twig->render('index.html.twig', ['info' => $info]);
$logger->info('New http request');
$logger->info('index.php');
