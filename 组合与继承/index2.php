<?php

/**
 *  组合优点
 *
 *  继承是紧耦合，组合有利于解耦
 */


class Car
{
    // 汽车加油
    public function addoil()
    {
        echo "Add oil \r\n";
    }
}

//继承实现
class Bmw extends Car
{

}

//组合实现
class Benz
{
    public $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    // 当使用组合实现加油方法 需要增加相关代码 算是组合相对继承的缺点
    public function addoil()
    {
        $this->car->addoil();
    }
}

$bmw = new Bmw();
$bmw->addoil();
$benz = new benz();
$benz->addoil();
