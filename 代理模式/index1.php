<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * Interface Subject
 *
 * 主题接口 定义真实主题和代理的公共方法
 */
interface Subject
{
    public function action();
}


/**
 * 真实主题
 *
 */
class RealSubject implements Subject
{
    /**
     * 执行操作
     */
    public function action()
    {
        echo '执行操作';
    }
}

class Proxy implements Subject
{
    protected $sub;

//    public function __construct(Subject $sub)
//    {
//        $this->sub = $sub;
//    }

    public function __construct()
    {
        $this->sub = new RealSubject();
    }

    /**
     * 这里由于加了一层代理 可以增加自己的功能呢 类似权限控制等功能
     */
    public function action()
    {
        return $this->sub->action();
    }
}


$proxy = new Proxy();
$proxy->action();

