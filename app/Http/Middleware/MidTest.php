<?php
/**
 * 前置后置中间件
 */
namespace App\Http\Middleware;

use Closure;

class MidTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        echo 'This is a Midtest';
        \Log::info('before_request' . json_encode($request));
        setcookie('beforeware', 'fdsfsdfsdfsdf', time() + 3600);
        $reponse = $next($request);
        return $reponse;
    }
    public function terminate($request, $response)
    {
        // 储存 session 数据...
//        \Log::info('after_response' . json_encode($response));
//        \Log::info('after_header' . json_encode($request));
    }
}
