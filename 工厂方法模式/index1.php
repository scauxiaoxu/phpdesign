<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

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