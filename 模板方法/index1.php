<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 模板方法模式
 *
 * 依赖继承实现
 */
abstract class Phone
{
    /**
     * 定义操作顺序
     *
     * 定义为final方法 决定执行顺序等行为只能由父类抽象类决定
     */
    final public function action()
    {
        $this->powerOn();
        $this->showLogo();
        $this->callUp();
    }

    /**
     * 开机
     */
    protected function powerOn()
    {
        echo '开机' . PHP_EOL;
    }

    /**
     * logo
     *
     * @return mixed
     */
    abstract protected function showLogo();

    /**
     * 打电话
     */
    protected function callUp()
    {
        echo '打电话' . PHP_EOL;
    }
}


class Xiaomi extends Phone
{
    protected function showLogo()
    {
        echo '小米logo' . PHP_EOL;
    }
}


class Huawei extends Phone
{
    protected function showLogo()
    {
        echo '华为logo' . PHP_EOL;
    }
}

$xiaomi = new Xiaomi();
$xiaomi->action();

echo PHP_EOL;

$huawei = new Huawei();
$huawei->action();