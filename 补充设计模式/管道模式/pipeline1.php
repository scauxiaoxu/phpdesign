<?php

// 管道模式

/**
 * 三个概念:管道,荷载(流水),过滤器(阀门)
 */
interface PipelineBuilderInterface
{
    public function __construct($payload);

    // 存入多个阀门
    public function pipe(StageBuilderInterface $stage);

    // 输出
    public function process();
}

// 具体管道类
class Pipeline implements PipelineBuilderInterface
{
    protected $payload;
    protected $pipes = [];

    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    public function pipe(StageBuilderInterface $stage)
    {
        $this->pipes[] = $stage;
        return $this;
    }

    public function process()
    {
        // 重点
        foreach ($this->pipes as $pipe) {
            call_user_func([$pipe, 'handle'], $this->payload);
        }
    }

}

//----------------------------------------------
// 阀门接口
interface StageBuilderInterface
{
    public function handle($payload);
}

class StageOneBuilder implements StageBuilderInterface
{
    public function handle($payload)
    {
        echo "处理: " . $payload . " in " . __METHOD__;
        echo PHP_EOL;
    }
}


class StageOneBuilder2 implements StageBuilderInterface
{
    public function handle($payload)
    {
        echo "~~: " . $payload . " in " . __METHOD__;
        echo PHP_EOL;
    }
}

$pipeline = new Pipeline("this is payload");
$pipeline->pipe(new StageOneBuilder())
    ->pipe(new StageOneBuilder2())
    ->process();



