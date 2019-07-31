<?php

use App\Controllers\HomeController;
use App\Controllers\TopicController;
use App\Controllers\UserController;

$app->get('/', HomeController::class . ':index');

$app->group('/topics', function() {
    $this->get('', TopicController::class . ':index');
    $this->get('/{id}', TopicController::class . ':show')->setName('topics.show');
});

$app->get('/users', UserController::class . ':index');