<?php

namespace App\Http\Controllers;

//use Illuminate\Routing\Controller;
use App\Common\Redis;
use App\Http\Model\Hello;
use App\Jobs\CloseOrder;
use Carbon\Carbon;
use Mockery\Exception;
use App\Jobs\Queue;
use App\Http\Controllers\Controller;

class TestRedisController extends Controller
{
    protected $model;

    public function __construct()
    {
    }

    public function index()
    {
    }

    public function test()
    {
//        $this->secKill();
        $this-> delayQueue();
    }

    /**
     * 队列实现秒杀
     * @return void
     */
    public function secKill()
    {
        //队列实现reidis秒杀
        $redis_name = 'sec_kill';
        //模拟100人请求秒杀(高压力)
        for ($i = 0; $i < 100; $i++) {
            $uid = rand(10000000, 99999999);
            //获取当前队列已经拥有的数量,如果人数少于十,则加入这个队列
            $num = 10;
            if (Redis::lLen($redis_name) < $num) {
                Redis::rPush($redis_name, $uid);
                echo $uid . "秒杀成功" . "<br>";
            } else {
                //如果当前队列人数已经达到10人,则返回秒杀已完成
                echo "秒杀已结束<br>";
            }
        }
    }

    /**
     * 异步实现延时队列
     * @return mixed
     */
    public function delayQueue()
    {
        $this->dispatch(new CloseOrder(30));

    }
}
