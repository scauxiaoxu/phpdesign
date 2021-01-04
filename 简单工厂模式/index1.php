<?php
/**
 *
 * Date: 2021/1/4
 * Time: 15:52
 *
 * File: index1.php
 * PROJECT_NAME: phpdesign
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