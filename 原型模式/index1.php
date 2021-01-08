<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

declare(strict_types=1);

/**
 * 当某个场景需要多次实例化类 可以考虑使用原型（Prototype）模式
 *
 * https://baijunyao.com/article/167 这里这篇文档对原型模式讲解的比较通透
 */
// 创建书本原型抽象类
abstract class BookPrototype
{
    protected $title;
    protected $category;

    abstract public function __clone();

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}

// 后续类通过clone这个类完成对象生成
class BarBookPrototype extends BookPrototype
{
    protected $category = 'Bar';

    public function __clone()
    {
    }
}

class FooBookPrototype extends BookPrototype
{
    protected $category = 'Foo';

    public function __clone()
    {
    }
}


//-----------------------------------------------------------------------------------------


$fooPrototype = new FooBookPrototype();
$barPrototype = new BarBookPrototype();

$fooPrototype1 = $fooPrototype;
$fooPrototype->setTitle("2222222");
var_dump($fooPrototype1);
// 这里注意了 php对象复制时引用传递来的 对原有类的修改会影响到被复制的类
var_dump($fooPrototype1 === $fooPrototype1);


$objArr = [];
for ($i = 0; $i < 10; $i++) {
    // 使用clone也可以减少new对象的开销
    $book = clone $fooPrototype;
    $book->setTitle('Foo Book No ' . $i);
    array_push($objArr, $book);
}
// clone不是引用
var_dump($objArr[0] === $objArr[1]);

for ($i = 0; $i < 5; $i++) {
    $book = clone $barPrototype;
    $book->setTitle('Bar Book No ' . $i);
    // 这里全部都是BarBookPrototype类的实例
    if (!$book instanceof BarBookPrototype) {
        echo "error" . PHP_EOL;
    }
}