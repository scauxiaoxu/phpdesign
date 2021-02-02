<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 观察者模式
 *
 * 实现一个对象发生变化后通知与它关联的类
 * 在实现开发中，可以使用php官方提供的SplObserver 和 SplSubject；
 */
abstract class SubjectAbstract
{
    /**
     * @var array
     */
    private $observers = [];

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        foreach ($this->observers as $k => $v) {
            if ($v === $observer) {
                unset($this->observers[$k]);
            }
        }
    }

    /**
     * 通知
     */
    public function notify()
    {
        foreach ($this->observers as $k => $v) {
            $v->update();
        }
    }
}

class Subject extends SubjectAbstract
{
    public function publish()
    {
        echo "do something" . PHP_EOL;
        // 执行通知

        $this->notify();
    }
}

interface Observer
{
    public function update();
}

class EmailObserver implements Observer
{
    public function update()
    {
        echo "发送相关通知邮件" . PHP_EOL;
    }
}

class SMSObserver implements Observer
{
    public function update()
    {
        echo "短信" . PHP_EOL;
    }
}

$sub = new Subject();
$sub->attach(new EmailObserver());

// 可以可以添加多个观察者
$sub->attach(new SMSObserver());

$sub->publish();