<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // csrf验证例外的路由
        // 例如:'home/index/index'单路由排除
        // 例如 'api/*' 就是api下的路由全排除
        // 当使用通配符*时表示所有路由排除,开发时可以开启
    ];
}
