<?php
// Stores the root of the application
define('COLA_ROOT', dirname(__FILE__));
// Stores the root opf the public dir
define('COLA_PUBLIC', COLA_ROOT . '/public');
// Stores cola version
define('COLA_VERSION', '0.1a');
// Store application namespace
define('APP_NAMESPACE', 'Application');

// Load the autoloader
require(COLA_ROOT . '/lib/Cola/Utils/SplClassLoader.php');

$colaAutoloader = new SplClassLoader('Cola', COLA_ROOT . '/lib');
$applicationAutoloader = new SplClassLoader(APP_NAMESPACE, COLA_ROOT . '/lib');
$colaAutoloader->register();
$applicationAutoloader->register();
$request = new Cola\Request_Base();
$frontController = new Cola\Controller_Front($request);
$frontController->dispatch();