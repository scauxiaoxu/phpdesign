<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

// A依赖B和C 存在耦合
// 对B和C 的改动都有可能影响到A
class A
{
    public $b;
    public $c;

    public function __construct()
    {
        //TODO
    }

    public function Method()
    {
        $this->b = new B();
        $this->c = new C();

        $this->b->Method();
        $this->c->Method();

        //TODO
    }
}

class B
{
    public function __construct()
    {
    }

    public function Method()
    {
        echo 'b' . PHP_EOL;
    }
}

class C
{
    public function __construct()
    {
    }

    public function Method()
    {
        echo 'c' . PHP_EOL;
    }
}

$a = new A();
$a->Method();