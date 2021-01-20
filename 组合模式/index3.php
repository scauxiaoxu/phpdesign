<?php

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

// 文件夹
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

// 文件
class File extends Component
{
    /**
     * @return mixed|string
     */
    public function display()
    {
        return '--' . $this->name . PHP_EOL;
    }
}

$dir = new Dir('Root');

$pathDir1 = new Dir('Pathdir1');
$pathDir2 = new Dir('Pathdir2');

$dir->add($pathDir1);
$dir->add($pathDir2);

$filePath1 = new File('PathFile1');

$pathDir1->add($filePath1);

$file1 = new File('File1');
$file2 = new File('File2');

$dir->add($file1);
$dir->add($file2);

echo $dir->display();


