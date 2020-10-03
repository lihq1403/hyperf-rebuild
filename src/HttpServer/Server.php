<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Rebuild\HttpServer;

class Server
{
    public function onRequest($request, $response)
    {
        // onRequest 方法里面我们吧刚才响应的代码补进来
        $response->header('Content-Type', 'text/html; charset=utf-8');
        $response->end('<h1>Hello Swoole. #' . rand(1000, 9999) . '</h1>');
        // 启动测试一次
        // 功能正常，也就是说现在写的各个功能都已经串联起来了
    }
}
