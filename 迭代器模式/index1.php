<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * php官方实现迭代器接口
 * @link:https://www.php.net/manual/zh/class.iterator.php
 */

//---------------------------

/**
 * 容器接口
 *
 */
interface ContainerInterface
{
    /**
     * 增加一个名字
     *
     * @param $name
     *
     * @return mixed
     */
    public function add($name);

    /**
     * 获取迭代器
     *
     * @return mixed
     */
    public function getIterator();
}


/**
 * 姓名容器
 */
class NameContainer implements ContainerInterface
{
    /**
     * @var array
     */
    protected $nameArray = [];

    /**
     * 增加一个名字
     *
     * @param $name
     *
     * @return mixed|void
     */
    public function add($name)
    {
        $this->nameArray[] = $name;
    }

    /**
     * 获取迭代器
     *
     * @return \Baijunyao\DesignPatterns\Iterator\NameIterator|mixed
     */
    public function getIterator()
    {
        return new NameIterator($this->nameArray);
    }
}


/**
 * 迭代器接口
 *
 * 实际项目中 需要迭代器空能使用php内置迭代器接口即可
 */
interface IteratorInterface
{
    /**
     * 判断是否还有下一个
     *
     * @return mixed
     */
    public function hasNext();

    /**
     * 获取下一个
     *
     * @return mixed
     */
    public function next();
}

/**
 * 姓名迭代器
 * Class NameIterator
 */
class NameIterator implements IteratorInterface
{
    /**
     * @var array
     */
    protected $nameArray = [];

    /**
     * @var int
     */
    protected $index = 0;

    /**
     * NameIterator constructor.
     *
     * @param $nameArray
     */
    public function __construct($nameArray)
    {
        $this->nameArray = $nameArray;
    }

    /**
     * 判断是否还有下一个姓名
     *
     * @return bool|mixed
     */
    public function hasNext()
    {
        return $this->index < count($this->nameArray);
    }

    /**
     * 下一个姓名
     *
     * @return mixed|void
     */
    public function next()
    {
        if ($this->hasNext()) {
            echo $this->nameArray[$this->index] . PHP_EOL;
            $this->index++;
        }
    }
}


$nameContainer = new NameContainer();
$nameContainer->add('张三');
$nameContainer->add('李四');
$nameContainer->add('王麻子');

$nameIterator = $nameContainer->getIterator();

while ($nameIterator->hasNext()) {
    $nameIterator->next();
}







