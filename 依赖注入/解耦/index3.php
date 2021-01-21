<?php
/**
 * File: index3.php
 * PROJECT_NAME: phpdesign
 */

require "index2.php";

echo "============================" . PHP_EOL . PHP_EOL;

/**
 * 通过ioc容器进行解耦
 *
 * ioc 控制反转 -> 应用本身不负责依赖对象的创建和维护 而是由外部容器负责
 */
// 实现一个容器类
class Container
{
    public $bindings;

    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function make($abstract, $param = [])
    {
        return call_user_func_array($this->bindings[$abstract], $param);
    }
}

//把绑定服务器
$con = new Container();
// 使用闭包去绑定 这里在绑定的时候不会去实例化DB类
//$con->bind("db1",new DB());
$con->bind("db", function () {
    return new DB();
});
$con->bind("session", function ($arg1, $arg2) {
    return new Session($arg1, $arg2);
});
$con->bind("fs", function ($arg1, $arg2) {
    return new FileSystem($arg1, $arg2);
});


class WriterNew
{
    protected $db;
    protected $fileSystem;
    protected $session;

    // 容器依赖
    public function __construct(Container $container)
    {
        $this->db         = $container->make("db");
        $this->fileSystem = $container->make("fs", [222, 333]);
        $this->session    = $container->make("session", [11, 22]);
    }

    public function write()
    {
        // do something
    }

}

$obj = new WriterNew($con);
var_dump($obj);


// 耦合 -> 参数绑定 -> 容器绑定(控制反转)