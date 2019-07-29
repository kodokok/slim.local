<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$app->get('/', function($request, $response) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/users', function($request, $response) {
    $users = [
        ['username' => 'john_snow'],
        ['username' => 'andre_star'],
        ['username' => 'remember_09'],
    ];

    return $this->view->render($response, 'users.twig', [
        'users' => $users,
    ]);
})->setName('users.index');

$app->run();