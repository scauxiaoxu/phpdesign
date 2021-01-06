<?php

/**
 * 使用较为广泛
 *
 * 常见使用场景
 * 1：数据库及资源连接
 * 2：日志记录器
 * 3：只需获得一个对象实例
 */

declare(strict_types=1);

Class A
{
    public $num = 0;

}

$a1 = new A();
$a2 = new A();
// 浅拷贝
$a2Clone = clone $a2;
$a2Copy  = $a2;

// 第二个是返回false的
var_dump($a1 == $a2);
var_dump($a1 === $a2);
$a2->num = 2;
echo "\$a2 num：" . $a2->num . PHP_EOL;
var_dump($a2Clone === $a2);
echo "\$a2Clone num：" . $a2Clone->num . PHP_EOL;

var_dump($a2Copy === $a2);
echo "\$aCopy num：" . $a2Copy->num . PHP_EOL;

class Singleton
{
    private static $instance = null;

    // 防止外部new
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new Singleton();
        }
        return static::$instance;
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }


    /**
     * 防止通过反序列化生成类实例
     *
     * $obj1 = Singleton::getInstance();
     * $obj2= unserialize(serialize($obj1));
     */
    private function __wakeup()
    {
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

// 这里将不被允许
//$b2Clone = clone $b2;