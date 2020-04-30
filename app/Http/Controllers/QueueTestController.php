<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;

class QueueTestController extends Controller
{
    public function test($data)
    {
        $str = (string)$data;
        $job = (new SendEmail($str));//->delay(\Carbon\Carbon::now()->addMinutes(1))
        \Log::info("INTO QUEUE".json_encode($job));
        $this->dispatch($job);
        return '队列添加成功';

    }
}
