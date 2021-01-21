<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 策略模式
 *
 * 将一系列行为和算法封装起来，以适应某些特定的上下文环境
 */
abstract class StrategyAbstract
{
    /**
     * 具体活动算法方法
     * @return mixed
     */
    public abstract function doAction($money);
}

// 满减
class ManJianStrategy extends StrategyAbstract
{
    public function doAction($money)
    {
        echo '满减算法：原价' . $money . '元';
    }
}


// 打折
class DaZheStrategy extends StrategyAbstract
{
    /**
     * 具体算法实现
     * @param $money
     * @return mixed|void
     */
    public function doAction($money)
    {
        echo '打折算法：原价' . $money . '元';
    }
}

// 策略工厂
class StrategyFind
{
    private $strategy_mode;

    /**
     * 初始时，传入具体的策略对象
     * @param $mode
     */
    public function __construct($mode)
    {
        $this->strategy_mode = $mode;
    }

    /**
     * 执行打折算法
     * @param $money
     */
    public function get($money)
    {
        $this->strategy_mode->doAction($money);
    }
}


// 满减折算
$mode1 = new StrategyFind(new ManJianStrategy());
$mode1->get(100);

echo PHP_EOL;

// 满减活动
$mode2 = new StrategyFind(new DaZheStrategy());
$mode2->get(100);