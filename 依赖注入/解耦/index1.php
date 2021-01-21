<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */


/**
 * 关于解耦 - 服务容器
 */



class DB
{
    public function __construct()
    {
        echo 'constructed!' . PHP_EOL;
    }
}

class FileSystem
{
    public function __construct($arg1, $arg2)
    {
        echo 'constructed!' . PHP_EOL;
    }
}

class Session
{
    public function __construct($arg1, $arg2)
    {
        echo 'constructed!' . PHP_EOL;
    }
}

// 定义处理类 同时操作数据库 文件 和 会话
class Writer
{
    // 严重耦合
    public function Write()
    {
        $db         = new DB(1, 2);
        $filesystem = new FileSystem(3, 4);
        $session    = new Session(5, 6);
    }
}

$writer=new Writer();
$writer->write();