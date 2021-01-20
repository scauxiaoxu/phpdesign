<?php

/**
 * 组合模式
 *
 * @link https://juejin.cn/post/6844903967407734792
 */

abstract class Role
{
    protected $userRoleList;
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
            ++$position;
            if ($n == $role) {
                array_splice($this->userRoleList, ($position), 1);
            }
        }
    }

    public function SendMessage()
    {
        echo "开始发送用户角色：" . $this->name . '下的所有用户短信', PHP_EOL;
        foreach ($this->userRoleList as $role) {
            $role->SendMessage();
        }
    }
}