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
        
        // In production, be sure to filter the input ($name) or escape the output to prevent XSS
        // How you do that is up to you, but you could use for example: https://www.php.net/manual/en/function.filter-var.php
        $response->getBody()->write($this->greeter->greet($name));
        return $response;
    }
}