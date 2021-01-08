<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 将某个类的接口转化成于另一个接口兼容
 *
 * 使用场景
 * 1：数据库客户端库适配器
 * 2：使用不同的webservices，通过适配器来标准化输出数据，使输出数据统一
 */
interface Book
{
    public function turnPage();

    public function open();

    public function getPage(): int;
}

interface EBook
{
    public function unlock();

    public function pressNext();

    /**
     * returns current page and total number of pages, like [10, 100] is page 10 of 100
     *
     * @return int[]
     */
    public function getPage(): array;
}

// 纸质书
class PaperBook implements Book
{
    private $page;

    public function open()
    {
        $this->page = 1;
    }

    public function turnPage()
    {
        $this->page++;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}

class Kindle implements EBook
{
    private $page = 1;
    private $totalPages = 100;

    public function pressNext()
    {
        $this->page++;
    }

    public function unlock()
    {
    }

    /**
     * returns current page and total number of pages, like [10, 100] is page 10 of 100
     *
     * @return int[]
     */
    public function getPage(): array
    {
        return [$this->page, $this->totalPages];
    }
}


// 定义电子书适配器
// 用来将电子书类兼容Book接口
class EBookAdapter implements Book
{
    protected $eBook;

    public function __construct(EBook $eBook)
    {
        $this->eBook = $eBook;
    }

    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }


    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}


$book = new PaperBook();
$book->open();
$book->turnPage();
var_dump($book->getPage() == 2);

echo PHP_EOL;

$eBook = new EBookAdapter(new Kindle());
$eBook->open();
$eBook->turnPage();
var_dump($eBook->getPage() == 2);