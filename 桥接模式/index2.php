<?php
/**
 * File: index2.php
 * PROJECT_NAME: phpdesign
 */

// 颜色抽象类
abstract class Color
{
    /**
     * @return mixed
     */
    abstract public function run();
}

class Red extends Color
{
    /**
     * @return mixed|string
     */
    public function run()
    {
        return '红色';
    }
}

class Yellow extends Color
{
    /**
     * @return mixed|string
     */
    public function run()
    {
        return '黄色';
    }
}

class Green extends Color
{
    /**
     * @return mixed|string
     */
    public function run()
    {
        return '绿色';
    }
}

//-----------------------------------------------------

// 形状抽象类
abstract class Graph
{
    /**
     * 颜色
     *
     * @var Color
     */
    protected $color;

    /**
     * Graph constructor.
     * @param Color $color
     */
    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    abstract public function draw();
}

class Square extends Graph
{
    public function draw()
    {
        echo "画一个 {$this->color->run()} 的正方形";
    }
}

class Triangle extends Graph
{
    public function draw()
    {
        echo "画一个 {$this->color->run()} 的三角形";
    }
}

class Circle extends Graph
{
    public function draw()
    {
        echo "画一个 {$this->color->run()} 的圆形";
    }
}

// 三种颜色
$red    = new Red();
$yellow = new Yellow();
$green  = new Green();

// 红色的正方形
$redSquare = new Square($red);
$redSquare->draw();
echo PHP_EOL;


// 黄色正方形
$yellowSquare = new Square($yellow);
$yellowSquare->draw();
echo PHP_EOL;

// 后续增加形状或者颜色的时候只要对应桥接就可以了