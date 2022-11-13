<?php
// public/index.php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;
use Framework\Controller\HelloController;

// This will make referencing files by path much simpler
$rootDir = realpath(__DIR__ . '/..');
define('ROOT_DIR', $rootDir);

require ROOT_DIR . '/vendor/autoload.php';

$app = AppFactory::create();

$container = new Container();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) use ($container) {
    /** @var Framework\Controller\HelloController */
    $helloController = $container->get(HelloController::class);
    return $helloController->hello($request, $response, $args);
});

$app->run();