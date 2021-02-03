<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 责任链模式
 *
 * 事件处理中 按照不同的级别 处理不同的事情
 * 无法处理则层层汇报
 */
//-----------------------------------------------

class board
{
    protected $lev = 1;
    protected $toplev = 'admin';

    public function process($lever)
    {
        if ($lever <= $this->lev) {
            echo '版主删帖，封号一年';
        } else {
            $top = new $this->toplev;
            $top->process($lever);
        }
    }
}

class admin
{
    protected $lev = 2;
    protected $toplev = 'police';

    public function process($lever)
    {
        //按照责任职责处理，发现无法处理，则向上一级汇报。
        if ($lever <= $this->lev) {
            echo '管理员永久封号';
        } else {
            $top = new $this->toplev;
            $top->process($lever);
        }
    }
}

class police
{
    protected $lev = 100;
    protected $toplev = null;

    public function process($lever = 0)
    {
        echo '抓起来，枪毙！';
    }
}

// 获取传递给脚本的参数数组
// 预定义变量 https://www.php.net/manual/zh/reserved.variables.argv.php
if (isset($argv[1])) {
    $lev = intval($argv[1]);
} else {
    $lev = 0;
}

echo '$lev =  ' . $lev;
echo PHP_EOL;

//责任链模式

$dealObj = new board();
$dealObj->process($lev);

