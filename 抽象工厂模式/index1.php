<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

/**
 * 工厂方法每个工厂只生产单一产品。当需要生产的产品很多的时候，就需要每个产品对应一个生产工厂
 *
 * 抽象工厂方法就是为了解决上诉问题而产生的
 */

interface CsvWriter
{
    public function write(array $line): string;
}

class UnixCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\n";
    }
}


class WinCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\r\n";
    }
}


interface JsonWriter
{
    public function write(array $data, bool $formatted): string;
}

class UnixJsonWriter implements JsonWriter
{
    public function write(array $data, bool $formatted): string
    {
        $options = 0;

        if ($formatted) {
            $options = JSON_PRETTY_PRINT;
        }

        return json_encode($data, $options);
    }
}

class WinJsonWriter implements JsonWriter
{
    public function write(array $data, bool $formatted): string
    {


        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

//------------------------------------------------

/**
 * 这里将不同对象的创建抽象成不同的方法 按产品划分多个产品
 * Interface WriterFactory
 */
interface WriterFactory
{
    // 这里如果新增一个产品的话 要修改全部的工厂类

    public function createCsvWriter():CsvWriter;

    public function createJsonWriter():JsonWriter;
}


class UnixWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new UnixCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new UnixJsonWriter();
    }
}

class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }
}

$obj1 = new UnixWriterFactory();
$obj  = $obj1->createJsonWriter();

// instanceof 是运算符，右边传入需要判断的类
var_dump($obj instanceof UnixJsonWriter);

// 因为UnixJsonWriter实现 JsonWriter接口，这里也会返回true
var_dump($obj instanceof JsonWriter);