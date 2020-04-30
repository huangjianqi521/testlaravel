<?php
namespace App\Http\Middleware;
use Closure;
class Activity
{

    public function handle($request,Closure $next)
    {
        if(time() < strtotime('2019-6-6')){
            return redirect('activity0');
        }

        return $next($request);
    }

}