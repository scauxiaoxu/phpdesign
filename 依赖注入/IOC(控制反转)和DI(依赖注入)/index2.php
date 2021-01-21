<?php
/**
 * File: index2.php
 * PROJECT_NAME: phpdesign
 */

require "index1.php";

echo "===========================".PHP_EOL.PHP_EOL;

/**
 * 利用 ~控制反转~ 进行优化
 *
 * 高层模块不应该过多的依赖于底层模块 两个都应该依赖抽象
 */

class ANew
{
    public $b;
    public $c;

    // 利用构造器注入
    // 不推荐使用 但是比不用好
    public function __construct($b,$c)
    {
        $this->b=$b;
        $this->c=$c;
    }
    public function Method()
    {
        $this->b->Method();
        $this->c->Method();
    }
}


class B1 extends B
{
    public function Method()
    {
        echo 'b1'.PHP_EOL;
    }
}
class B2 extends B
{
    public function Method()
    {
        echo 'b2'.PHP_EOL;
    }
}

$obj = new ANew(new B(),new C());
$obj->Method();

// 此时 如果对B类进行了扩充 客户端可以这么写
echo PHP_EOL;

$obj = new ANew(new B1(),new C());
$obj->Method();




