<?php
/**
 * File: index3.php
 * PROJECT_NAME: phpdesign
 */

require "index1.php";
echo "===========================".PHP_EOL.PHP_EOL;

/**
 * 利用工厂模式进行注入
 */

class Factory
{
    public function create($s)
    {
        switch($s)
        {
            case 'B':
                {
                    return new B();
                    break;
                }
            case 'C':
                {
                    return new C();
                    break;
                }
            default:
                {
                    return null;
                    break;
                }
        }
    }
}

class ANew
{
    public $b;
    public $c;

    public function __construct()
    {

    }

    // 利用工厂方法进行注入
    public function Method()
    {
        $f = new Factory();
        $this->b = $f->create('B');
        $this->c = $f->create('C');

        $this->b->Method();
        $this->c->Method();
    }
}

$obj = new ANew();
$obj->Method();