<?php
// src/Controller/HelloController.php
namespace Framework\Controller;

use Framework\Util\Greeter;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HelloController
{
    public function __construct(
        protected Greeter $greeter
    ) {}

    public function hello(Request $request, Response $response, array $args) 
    {
        $name = $args['name'];
        $response->getBody()->write($this->greeter->greet($name));
        return $response;
    }
}