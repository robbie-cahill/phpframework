<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\Container;

// This will make referencing files by path much simpler
$rootDir = realpath(__DIR__ . '/..');
define('ROOT_DIR', $rootDir);

require ROOT_DIR . '/vendor/autoload.php';

$app = AppFactory::create();

$container = new Container();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();