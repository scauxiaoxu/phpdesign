<?php
/**
 * File: index2.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 组合模式
 *
 * 解决 整体 和部分 可以一直对待的问题 比如 文件和文件夹
 * 将对象组合成树形结构以表示整体和部分的层次结构
 */

/**
 * 包含树枝节点和叶子节点方法的抽象类
 * Class Component
 */
abstract class Component
{
    /**
     * @var
     */
    protected $name;

    /**
     * Component constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    abstract public function display();
}


/**
 * 文件夹
 * Class Dir
 */
class Dir extends Component
{
    /**
     * @var array
     */
    protected $children = [];

    /**
     * 添加子节点
     *
     * @param Component $component
     */
    public function add(Component $component)
    {
        $this->children[] = $component;
    }

    /**
     * @return mixed|string
     */
    public function display()
    {
        $nameStr = $this->name . PHP_EOL;
        foreach ($this->children as $k => $v) {
            $nameStr .= '--' . $v->display();
        }
        return $nameStr;
    }
}


/**
 * 文件
 * Class File
 */
class File extends Component
{
    public function add(Component $component)
    {
        throw new \Exception('文件不能添加子节点');
    }

    public function display()
    {
        return '--' . $this->name . PHP_EOL;
    }
}

$dir   = new Dir("根目录");
$file1 = new File("文件1");
$file2 = new File("文件2");

$dir->add($file1);
$dir->add($file2);

ECHO($dir->display());