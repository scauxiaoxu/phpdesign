<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

/**
 * 桥接模式
 * 将抽象部分与实现部分分离，是他们可以有独立的变化组合
 *
 * - link:https://baijunyao.com/article/170
 *
 */

interface Formatter
{
    public function format(string $text): string;
}


class PlainTextFormatter implements Formatter
{
    public function format(string $text): string
    {
        return $text;
    }
}

class HtmlFormatter implements Formatter
{
    public function format(string $text): string
    {
        return sprintf('<p>%s</p>', $text);
    }
}


abstract class Service
{
    protected $implementation;

    public function __construct(Formatter $printer)
    {
        $this->implementation = $printer;
    }

    public function setImplementation(Formatter $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get(): string;
}


class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello World');
    }
}



class PingService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('pong');
    }
}


$service = new HelloWorldService(new PlainTextFormatter());
var_dump($service->get());

$service = new HelloWorldService(new HtmlFormatter());
var_dump($service->get());