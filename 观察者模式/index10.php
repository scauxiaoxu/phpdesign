<?php

/**
 * 观察者模式
 *
 * 将一个系统分割成一系列相互协助的类有一个很不好的作用，就是维护对象的一致性。观察者模式就是为了解决这个问题产生的
 */

abstract class Subject
{
    private $observers = [];

    public function attach(Observer $observer)
    {
        array_push($this->observers, $observer);
    }

    public function detatch($observer)
    {
        foreach ($this->observers as $key => $value) {
            if ($observer === $value) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

// 观察者抽象接口
abstract class Observer
{
    abstract function update();
}

// 被观察的类
class ConcreteSubject extends Subject
{
    private $subjectState;

    public function setState($state)
    {
        $this->subjectState = $state;
    }

    public function getState()
    {
        return $this->subjectState;
    }
}

// 观察者类
class ConcreteObserver extends Observer
{
    private $name;
    private $subject;

    //将需要观察的类注入到观察者中，同时设置观察者名称
    public function __construct(ConcreteSubject $subject, $name)
    {
        $this->subject = $subject;
        $this->name    = $name;
    }

    // 设置观察行为
    public function update()
    {
        echo "观察者 " . $this->name . "的新状态是:" . $this->subject->getState() . "\n";
    }
}

$s = new ConcreteSubject();
//此处定义多个观察者监听同一个主题对象
$s->attach(new ConcreteObserver($s, "x"));
$s->attach(new ConcreteObserver($s, "y"));
$z = new ConcreteObserver($s, "z");
$s->attach($z);
$s->detatch($z);


//当这个对象在状态发生变化时，通知所有观察者
$s->setState('ABC');
$s->notify();