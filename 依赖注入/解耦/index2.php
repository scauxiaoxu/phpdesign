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
    protected $db;
    protected $fileSystem;
    protected $session;

    // 参数依赖
    public function __construct(DB $DB, FileSystem $fileSystem, Session $session)
    {
        $this->db         = $DB;
        $this->fileSystem = $fileSystem;
        $this->session    = $session;
    }

    public function write()
    {
        // do something
    }

}

$DB         = new DB();
$fileSystem = new FileSystem(1, 2);
$session    = new Session(1, 2);
$writer     = new Writer($DB, $fileSystem, $session);
$writer->write();