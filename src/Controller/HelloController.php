<?php
namespace Framework\Controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HelloController
{
    public function hello(Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}