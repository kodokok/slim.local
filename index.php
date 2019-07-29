<?php

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ]
]);

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
        'cache' => false,
    ]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$app->get('/contact', function($request, $response) {
    return $this->view->render($response, 'contact.twig');
});

$app->get('/contact/confirm', function($request, $response) {
    return $this->view->render($response, 'contact_confirm.twig');
});

$app->post('/contact', function($request, $response) {
    return $response->withRedirect('http://localhost/slim.local/contact/confirm');
})->setName('contact');

$app->run();