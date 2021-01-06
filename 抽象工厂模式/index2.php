<?php
/**
 * File: index2.php
 * PROJECT_NAME: phpdesign
 */

include "index1.php";

echo "--------------------------------------------" . PHP_EOL;

Class CommonFactory implements WriterFactory
{
    protected $product = "Unix";

    public function __construct($product = null)
    {
        if ($product) {
            $this->product = $product;
        }
    }

    // 抽象工厂方法结合简单工厂方法
    // 父类方法定义了返回值类型 当子类方法继承父类方法的时候也要定义返回值类型
    public function createCsvWriter(): CsvWriter
    {
        switch ($this->product) {
            case "Unix":
                $obj = new UnixCsvWriter();
                break;
            case "Win":
                $obj = new WinCsvWriter();
                break;
            default:
                throw new InvalidArgumentException("产品异常");
        }
        return $obj;
    }

    public function createJsonWriter(): JsonWriter
    {
        switch ($this->product) {
            case "Unix":
                $obj = new UnixJsonWriter();
                break;
            case "Win":
                $obj = new WinJsonWriter();
                break;
            default:
                throw new InvalidArgumentException("产品异常");
        }
        return $obj;
    }
}

$factory = new CommonFactory();
$objCom1 = $factory->createCsvWriter();
var_dump($objCom1);