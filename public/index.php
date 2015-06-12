<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
 
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

defined('__DIR__') || define('__DIR__', dirname(__FILE__));

// The project root directory, where you'll find the application and public directories
define('PROJECT_ROOT', realpath(__DIR__ . '/../'));

// Define path to application directory
define('LIBRARY_PATH', realpath(PROJECT_ROOT . '/library'));


// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR,
    array(
        LIBRARY_PATH,
        get_include_path()
    )
));

/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Zend/Config/Ini.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
    

$application->bootstrap()
            ->run();
