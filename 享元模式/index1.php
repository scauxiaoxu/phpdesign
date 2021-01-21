<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 享元模式
 *
 * 减少实例化大量的类时对内存的占用
 *
 * 和单例模式比较像，区别
 * 1：享元模式可以再次创建对象，也可以取缓存对象，单例模式则严格控制进程中只有一个实例对象
 *
 */


/**
 * 享元抽象类
 *
 * Class Flyweight
 */
abstract class Flyweight
{
    /**
     * @var
     */
    protected $name;

    /**
     * Flyweight constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $content
     */
    public function show($content)
    {
    }
}


/**
 * 共享的具体享元类
 *
 */
class ConcreteFlyweight extends Flyweight
{
    /**
     * @param $content
     */
    public function show($content)
    {
        echo '共享的享元：' . $this->name . " " . $content . PHP_EOL;
    }
}


/**
 * 不共享的具体享元类
 *
 * Class UnsharedConcreteFlyweight
 */
class UnsharedConcreteFlyweight extends Flyweight
{
    /**
     * @param $content
     */
    public function show($content)
    {
        echo '不共享的享元：' . $this->name . $content . PHP_EOL;
    }

    /**
     * 附加的删除方法
     */
    public function delete()
    {
        $this->name = '';
    }
}


/**
 * 享元工厂
 *
 * Class FlyweightFactory
 *
 */
class FlyweightFactory
{
    /**
     * @var array
     */
    private $flyweights = [];

    /**
     * @param $name
     *
     * @return mixed
     */
    public function getFlyweight($name)
    {
        if (!isset($this->flyweights[$name])) {
            $this->flyweights[$name] = new ConcreteFlyweight($name);
        }
        return $this->flyweights[$name];
    }
}


$flyweight = new FlyweightFactory();
$zhangsan1 = $flyweight->getFlyweight('170cm的模特');
$zhangsan1->show('第1件L号的衣服');


$zhangsan2 = $flyweight->getFlyweight('170cm的模特');
$zhangsan2->show('第99件L号的衣服');

var_dump($zhangsan1 === $zhangsan2);
echo PHP_EOL;


$lisi = $flyweight->getFlyweight('180cm的模特');
$lisi->show('第1件XXL号的衣服');


$wangmazi = new UnsharedConcreteFlyweight('190cm的模特');
$wangmazi->show('第1件XXXL号的衣服');
$wangmazi->delete();
$wangmazi->show('第1件XXXL号的衣服');



