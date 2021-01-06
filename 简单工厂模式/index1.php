<?php

/**
 * 当项目里需要重复new一个类的时候可以考虑工厂方法
 *
 * 使用工厂类统一生成对象
 */

declare(strict_types=1);

/**
 * 在工厂类中生成对象
 */
class SimpleFactory
{
    public function createBicycle(): Bicycle
    {
        return new Bicycle();
    }
}

class Bicycle
{
    public function driveTo(string $destination): string
    {
        return $destination;
    }
}


$factory = new SimpleFactory();
$bicycle = $factory->createBicycle();
echo $bicycle->driveTo('Paris');