<?php
/**
 * File: index1.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 门面模式 又称 外观模式
 *
 * 减少系统之间的耦合，降低复杂度
 */
class File
{
    public function content()
    {
        return "这个是文本内容";
    }
}

class Encrypt
{
    public function encry(string $content)
    {
        return "对字符串进行加密";
    }
}


class Facade
{
    private $file;
    private $encrypt;

    public function __construct()
    {
        $this->file    = new File();
        $this->encrypt = new Encrypt();
    }

    public function encryContent()
    {
        $str = $this->file->content();
        return $this->encrypt->encry($str);
    }
}


$facade = new Facade();
echo $facade->encryContent();

