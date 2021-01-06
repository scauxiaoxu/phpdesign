<?php

declare(strict_types=1);

/**
 * 和简单工厂模式类似 只是通过静态方法实例化类
 *
 * 有时间也将静态工厂模式 划分到 简单工厂模式里面
 */
final class StaticFactory
{
    public static function factory(string $type): Formatter
    {
        if ($type == 'number') {
            return new FormatNumber();
        } elseif ($type == 'string') {
            return new FormatString();
        }

        throw new InvalidArgumentException('Unknown format given');
    }
}

interface Formatter
{
    public function format(string $input): string;
}

class FormatNumber implements Formatter
{
    public function format(string $input): string
    {
        return number_format((int)$input);
    }
}

class FormatString implements Formatter
{
    public function format(string $input): string
    {
        return $input;
    }
}


$numF = StaticFactory::factory("number");
var_dump($numF->format("123"));