<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

/**
 * 工厂方法模式
 *
 * 优点：当需要增加新的产品时，只需要增加新的工厂类即可，不需要改动原来的代码（符合开闭原则）
 */

interface Logger
{
    public function log(string $message);
}


class StdoutLogger implements Logger
{
    public function log(string $message)
    {
        echo $message;
    }
}

class FileLogger implements Logger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message)
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

//-------------------------------------------------------------

/**
 * Interface LoggerFactory
 * 这里也可以定义abstract
 *
 * 定义工厂接口 让子类实现具体创建类的过程。当需要增加创建类的时候，只需要增加工厂子类就可以了
 */
interface LoggerFactory
{
    public function createLogger(): Logger;
}


class StdoutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}

class FileLoggerFactory implements LoggerFactory
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }
}

$ss = (new StdoutLoggerFactory())->createLogger();
$ss->log("aaaaa");