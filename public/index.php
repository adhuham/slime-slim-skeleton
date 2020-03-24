<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Core\Bootstrap;

define('_ROOT_', __DIR__ . '/..');
define('_APP_', _ROOT_ . '/app');
define('_CONFIG_', _ROOT_ . '/config');
define('_CORE_', _ROOT_ . '/core');
define('_RESOURCES_', _ROOT_ . '/resources');
define('_PUBLIC_', _ROOT_ . '/public');

require_once _ROOT_ . '/vendor/autoload.php';

// setting up the container
$container = new Container();
AppFactory::setContainer($container);

// create the app
$app = AppFactory::create();
Bootstrap::$appInstance = $app;

// load config, init database ... and do other bootstrapping stuff
$bootstrap = new Bootstrap();

require_once _APP_ . '/middleware.php';
require_once _APP_ . '/routes.php';

$app->run();
