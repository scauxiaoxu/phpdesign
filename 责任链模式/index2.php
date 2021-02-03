<?php
/**
 * File: index2.php
 * PROJECT_NAME: phpdesign
 */

/**
 * 建立对象链按指定顺序处理调用，如果其中一个对象无法处理命令，则委托这个调用给它的下一个对象来处理
 *
 * 常用应用模式
 * 1：日志框架，每个链元素自主决定如果处理日志消息
 * 2：邮件垃圾处理器
 */

declare(strict_types=1);

use Psr\Http\Message\RequestInterface;

// 处理器抽象类
abstract class Handler
{
    private $successor = null;

    public function __construct(Handler $handler = null)
    {
        $this->successor = $handler;
    }

    /**
     * 模板方法模式
     *
     * This approach by using a template method pattern ensures you that
     * each subclass will not forget to call the successor
     */
    final public function handle(RequestInterface $request): ?string
    {
        $processed = $this->processing($request);

        if ($processed === null && $this->successor !== null) {
            // 当没有被目前处理器处理时 进行传递
            // the request has not been processed by this handler => see the next
            $processed = $this->successor->handle($request);
        }

        return $processed;
    }

    abstract protected function processing(RequestInterface $request): ?string;
}


// HTTP缓存处理器类
class HttpInMemoryCacheHandler extends Handler
{
    private $data;

    public function __construct(array $data, ?Handler $successor = null)
    {
        parent::__construct($successor);

        $this->data = $data;
    }

    protected function processing(RequestInterface $request): ?string
    {
        $key = sprintf(
            '%s?%s',
            $request->getUri()->getPath(),
            $request->getUri()->getQuery()
        );

        if ($request->getMethod() == 'GET' && isset($this->data[$key])) {
            return $this->data[$key];
        }

        return null;
    }
}

// 数据库处理器类
class SlowDatabaseHandler extends Handler
{
    protected function processing(RequestInterface $request): ?string
    {
        // this is a mockup, in production code you would ask a slow (compared to in-memory) DB for the results
        return 'Hello World!';
    }
}