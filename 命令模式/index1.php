<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 命令模式
 *
 * 适合于执行命令的场景
 * 命令发送者调用execute() 然后在具体命令类中设置命令接收者 消失命令发送者和命令接收者之间的耦合
 */
interface CommandInterface
{
    public function execute();
}

/**
 * 具体命令类
 */
class Command implements CommandInterface
{
    protected $receiver;

    /**
     * Command constructor.
     *
     * @param \Baijunyao\DesignPatterns\Command\Receiver $receiver
     */
    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * @return mixed|void
     */
    public function execute()
    {
        $this->receiver->action();
    }
}


/**
 * 命令发送者
 */
class Invoker
{

    protected $command;


    public function setCommand(Command $command)
    {
        $this->command = $command;
    }

    /**
     * 执行
     */
    public function run()
    {
        $this->command->execute();
    }
}

/**
 * 命令接收者
 */
class Receiver
{
    /**
     * 执行操作
     */
    public function action()
    {
        echo '执行操作';
    }
}

// 命令行类设定接受者
$receiver = new Receiver();
$command  = new Command($receiver);

// 命令接受者调用命令
$invoker = new Invoker();
$invoker->setCommand($command);
$invoker->run();