<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;
    private $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $data)
    {
        $this->data = $data;
//        $this->email = $data;
        \Log::info("-------------------CONSTRUCT_DATA" . date("Y-m-d H:i:s", time()) . ":".$data);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("-----------------HANDLE_DATA_ INSERT_BRFORE" . date("Y-m-d H:i:s", time()) . ":" .'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
        $res = \DB::table('queue')->insert([
            'data' => $this->data
        ]);

//        $res = Mail::raw('队列测试', function($message){
//            $message->to($this->email);
//        });
        \Log::info("-----------------HANDLE_DATA_ INSERT" . date("Y-m-d H:i:s", time()) . ":" . json_encode($res));
    }
}
