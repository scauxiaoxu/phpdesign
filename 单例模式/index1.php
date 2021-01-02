<?php

/**
 * 使用较为广泛
 *
 * 常见使用场景
 * 1：数据库及资源连接
 * 2：只需获得一个对象实例
 */

Class A
{

}

$a1 = new A();
$a2 = new A();

// 第二个是返回false的
var_dump($a1 == $a2);
var_dump($a1 === $a2);

class Singleton
{
    private static $instance = null;

    // 防止外部new
    private function __construct(){}

    public static function getInstance()
    {
        if (static::$instance === null)
        {
            static::$instance = new Singleton();
        }
        return static::$instance;
    }
}

try {
    // PHP Fatal error:  Uncaught Error: Call to private Singleton::__construct() from invalid context
    /** @noinspection ALL */
    $obj = new Singleton();
} catch (Error $e) {
    // 不能被new了
}

$b1 = Singleton::getInstance();
$b2 = Singleton::getInstance();
// 返回true
var_dump($b1 === $b2);