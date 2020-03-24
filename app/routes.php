<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controller\SampleController;

$app->get('/', SampleController::class)->setName('home');
