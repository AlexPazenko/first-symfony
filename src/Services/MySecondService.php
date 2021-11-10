<?php
namespace App\Services;

class MySecondService implements ServiceInterface
{
    public function __construct()
    {
        dump('hello from MySecondService');
    }

    public function doSomething()
    {
        dump('from second doSomething');
    }

    public function doSomething2()
    {
        return 'wow!';
    }

    public function someMethod()
    {
        return "Hello!";
    }
}