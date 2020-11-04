<?php

use Blogg\Http\Router;

require __DIR__ . '/vendor/autoload.php';

define('ROOT_URL', 'https://' . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');

if (empty($_SESSION)) {
    session_start();
}

Router::start([
    'controller' => 'blogController', // or specific: $_GET['p'] ?? 'blogController'
    'action' => $_GET['action'] ?? 'home'
]);
