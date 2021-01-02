<?php

/**
 * 面向对象程序设计中，两种最常用的技巧就是 类继承 和 对象组合
 *
 * 继承实现常常是一种 `白盒复用`，子类继承父类需要了解父类内部的实现机制
 * 组合实现代码复用基于  `黑盒复用`
 *
 */


class Person
{
    public $name = 'Tom';
    public $gender;
    static $money = 10;

    public function __construct()
    {
        echo '这就是父类', PHP_EOL;
    }

    public function say()
    {
        echo $this->name, "\tis\t", $this->gender, "\r\n";
    }
}

class Family extends Person
{
    // 父类访问级别为public 子类也只能是public
    public $name;
    public $gender;
    public $age;
    static $money = 100000;

    public function __construct()
    {
        parent::__construct(); //调用父类的构造方法
        echo '这里是子类', PHP_EOL;
    }

    public function say()
    {
        parent::say();
        echo $this->name, "\tis\t", $this->gender, "\tand age is\t", $this->age, PHP_EOL;
    }

    public function cry()
    {
        // 此处如果用statc 也会绑定当前类的静态属性
        echo parent::$money, PHP_EOL;
        echo '%>_<%', PHP_EOL;
        echo self::$money, PHP_EOL;
        echo '(*^_^*)' . PHP_EOL;
    }
}

$poor = new Family();
$poor->name = 'Lee';
$poor->gender = 'female';
$poor->age = 25;
$poor->say();
echo PHP_EOL;
$poor->cry();
