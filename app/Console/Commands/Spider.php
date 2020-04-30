<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Pool;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Spider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:spider {concurrency} {keyWords*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Log::info("fdffdfdfdf");
        $concurrency = $this->argument('concurrency');  //并发数
        $keyWords = $this->argument('keyWords');    //查询关键词
        $guzzleClent = new GuzzleClient();
        $client = new GoutteClient();
        $client->setClient($guzzleClent);
        $request = function ($total) use ($client, $keyWords) {
            foreach ($keyWords as $key) {
                $url = 'https://laravel-china.org/search?q=' . $key;
                yield function () use ($client, $url) {
                    return $client->request('GET', $url);
                };
            }
        };
        $pool = new Pool($guzzleClent, $request(count($keyWords)), [
            'concurrency' => $concurrency,
            'fulfilled' => function ($response, $index) use ($client) {
                $response->filter('h2 > a')->reduce(function ($node) use ($client) {
                    if (strlen($node->attr('title')) == 0) {
                        $title = $node->text();             //文章标题
                        $link = $node->attr('href');        //文章链接
                        $carwler = $client->request('GET', $link);       //进入文章
                        Log::info(json_encode($carwler));
                        $content = $carwler->filter('#emojify')->first()->text();     //获取内容
                        Log::info("---------JSON_ENCODE:".json_encode($content));
                        Storage::disk('local')->put($title, $content);           //储存在本地
                    }
                });
            },
            'rejected' => function ($reason, $index) {
                $this->error("Error is " . $reason);
            }
        ]);
        //开始爬取
        $promise = $pool->promise();
        $promise->wait();
    }
}
