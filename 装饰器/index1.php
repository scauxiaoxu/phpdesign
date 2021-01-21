<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

/**
 * 装饰模式
 *
 * 为已有的类动态添加更多功能而不改变原有的类 主要使用对象的关联代替继承
 * 核心思想：组合优于继承
 */
interface Food
{
    public function food();

    public function price(): float;
}

class Shouzhuabing implements Food
{
    public function food()
    {
        return "手抓饼";
    }

    public function price(): float
    {
        return 12.3;
    }
}


class Kaolengmian implements Food
{
    public function food()
    {
        return "烤冷面";
    }

    public function price(): float
    {
        return 20;
    }
}

// 原有类的调用
$food = new Kaolengmian();
echo $food->food() . " 价格: " . $food->price() . PHP_EOL;

// 增加装饰器
abstract class Decorator implements Food
{
    protected $food;

    public function __construct(Food $food)
    {
        $this->food = $food;
    }
}

// 鸡蛋食物
class Egg extends Decorator
{
    public function food()
    {
        return $this->food->food() . " 增加了鸡蛋";
    }

    // 这里也可以对原有类进行功能修改
    public function price(): float
    {
        return $this->food->price() + 100;
    }

    // 这里可以使用装饰器类进行扩充了
    public function show()
    {
        return $this->food->food() . " 好吃";
    }
}


$food = new Egg(new Kaolengmian());
echo $food->food() . " 价格: " . $food->price() . PHP_EOL;