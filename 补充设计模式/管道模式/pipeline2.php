<?php

//模仿laravel pipeline

interface PipelineInterface
{
    public function send($traveler);

    public function through($stops);

    public function via($method);

    public function process();
}

interface StageInterface
{
    public function handle($payload);
}

class StageOne implements StageInterface
{
    public function handle($payload)
    {
        echo $payload . " in " . __METHOD__;
        echo PHP_EOL;
    }
}

class StageTwo implements StageInterface
{
    public function handle($payload)
    {
        echo 'awesome man';
        echo PHP_EOL;
    }
}

class Pipe implements PipelineInterface
{
    protected $container;
    protected $passable;
    protected $pipes = [];
    protected $via = 'handle';

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function send($traveler)
    {
        $this->passable = $traveler;
        return $this;
    }

    public function through($pipes)
    {
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();
        return $this;
    }

    public function via($method)
    {
        $this->via = $method;
        return $this;
    }

    public function process()
    {
        foreach ($this->pipes as $pipe) {
            // 将返回值传递给下一个处理参数
            $this->passable = call_user_func([$pipe, $this->via], $this->passable);
        }
    }
}

$container = 'a';
$payload = 'payLoad';
$pipe = new Pipe($container);

$pipe->send($payload)
    ->through([new StageOne(), new StageTwo()])
    ->process();