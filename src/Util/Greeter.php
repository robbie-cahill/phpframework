<?php
// src/Util/Greeter.php
namespace Framework\Util;

class Greeter
{
    public function greet(string $name) : string
    {
        return "Hello, $name";
    }
}