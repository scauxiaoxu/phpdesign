<?php

/**
 * 建造者模式  有时也称生成器模式
 *
 * 将一个复杂对象的构造和它的表示分离
 */

// 定义抽象类或接口
abstract class PersonBuilder
{
    abstract public function BuildHead();

    abstract public function BuildBody();

    abstract public function BuildArmLeft();

    abstract public function BuildArmRight();

    abstract public function BuildLegLeft();

    abstract public function BuildLegRight();
}

class PersonThinBuilder extends PersonBuilder
{
    public function BuildHead()
    {
        echo "小头\n";
    }

    public function BuildBody()
    {
        echo "小身子\n";
    }

    public function BuildArmRight()
    {
        echo "右臂\n";
    }

    public function BuildArmLeft()
    {
        echo "左臂\n";
    }

    public function BuildLegLeft()
    {
        echo "左腿\n";
    }

    public function BuildLegRight()
    {
        echo "右腿\n";
    }
}

class PersonFatBuilder extends PersonBuilder
{
    public function BuildHead()
    {
        echo "大头\n";
    }

    public function BuildBody()
    {
        echo "大身子\n";
    }

    public function BuildArmRight()
    {
        echo "右臂\n";
    }

    public function BuildArmLeft()
    {
        echo "左臂\n";
    }

    public function BuildLegLeft()
    {
        echo "左腿\n";
    }

    public function BuildLegRight()
    {
        echo "右腿\n";
    }
}

class PersonDirector
{
    private $personBuilder;

    function __construct(PersonBuilder $personBuilder)
    {
        $this->personBuilder = $personBuilder;
    }

    public function CreatePerson()
    {
        $this->personBuilder->BuildHead();
        $this->personBuilder->BuildBody();
        $this->personBuilder->BuildArmRight();
        $this->personBuilder->BuildArmLeft();
        $this->personBuilder->BuildLegLeft();
        $this->personBuilder->BuildLegRight();
    }
}


echo "苗条的:" . PHP_EOL;
//建造者模式 将构建与表示分离
$thinDirector = new PersonDirector(new PersonThinBuilder());
$thinDirector->CreatePerson();

echo PHP_EOL . "胖的:." . PHP_EOL;
$fatDirector = new PersonDirector(new PersonFatBuilder());
$fatDirector->CreatePerson();