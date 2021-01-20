<?php

/**
 * 组合模式
 *
 * 保证各个节点不断延伸同时递归在可控的范围内 结构清晰
 *
 * @link https://juejin.cn/post/6844903967407734792
 */

abstract class Role
{
    protected $userRoleList = [];
    protected $name;

    public function __construct(String $name)
    {
        $this->name = $name;
    }

    abstract public function Add(Role $role);

    abstract public function Remove(Role $role);

    abstract public function SendMessage();
}

class RoleManger extends Role
{
    public function Add(Role $role)
    {
        $this->userRoleList[] = $role;
    }

    public function Remove(Role $role)
    {
        $position = 0;

        foreach ($this->userRoleList as $n) {
            if ($n == $role) {
                array_splice($this->userRoleList, ($position), 1);
            }
            ++$position;
        }
    }

    public function SendMessage()
    {
        echo "开始发送用户角色：" . $this->name . ' 下的所有用户短信', PHP_EOL;
        foreach ($this->userRoleList as $role) {
            $role->SendMessage();
        }
    }
}


class Team extends Role
{

    public function Add(Role $role)
    {
        echo "小组用户不能添加下级了！", PHP_EOL;
    }

    public function Remove(Role $role)
    {
        echo "小组用户没有下级可以删除！", PHP_EOL;
    }

    public function SendMessage()
    {
        echo "小组用户角色：" . $this->name . ' 的短信已发送！', PHP_EOL;
    }
}


// root用户
$root = new RoleManger('root');
$root->add(new Team('主站用户'));
$root->SendMessage();

echo "----------------------------------" . PHP_EOL;

// 社交版块 root2的组合可以不断向下延伸 通过组合模式实现 结构清晰
$root2    = new RoleManger('root-社交');
$managerA = new RoleManger('论坛用户');
$managerA->add(new Team('北京论坛用户'));
$managerA->add(new Team('上海论坛用户'));


$managerB = new RoleManger('sns用户');
$managerB->add(new Team('北京sns用户'));
$managerB->add(new Team('上海sns用户'));

$root2->add($managerA);
$root2->add($managerB);
$root2->SendMessage();

echo "----------------------------------" . PHP_EOL;

$root2->Remove($managerB);
$root2->SendMessage();




