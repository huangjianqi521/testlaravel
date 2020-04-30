<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\Queue;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:ob';//测试缓存

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test ob';

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
        ini_set('memory_limit', '2048M');
//        $this->dispatch(new Queue([1,2,5,4,5,66,3]));

//        $d = __NAMESPACE__ . '\MYCONST';
//        echo constant($d);
//        for ($i = 0; $i < 3; $i++) {
//            echo $i;
////            ob_flush();
//            flush();
//            sleep(3);
//        }
        $data = $this->getOrderData();
        $startTime = microtime(true);
//        echo "开始时间:" . $startTime;
        $result = $this->searchBinary($data, 1000000);
//        $result = $this->searchOrder($data, 1000000);
        $endTime = microtime(true);
//        echo "结束时间:" . $endTime;

        echo "耗时:" . ($endTime - $startTime) . '|' . "结果" . json_encode($result);
    }

    /**
     * 获取数据源
     * @return array
     */
    public function getOrderData()
    {
        $array = [];
        for ($i = 1; $i <= 1000000; $i++) {
            $array[] = $i;
        }

        return $array ?? [];
    }

    /**
     * 二分查找
     * @param  array $data
     * @param  string $elem
     * @return string
     */
    public function searchBinary($data, $elem)
    {
        $low = 0;
        $high = count($data) - 1;
        while ($low <= $high) {
            $mid = (int)($low + ($high - $low) / 2);
//            echo $low . '_' . $mid . '_' . $high . PHP_EOL;
//            echo "中间" . $data[$mid] . $elem . PHP_EOL;
            if ($data[$mid] == $elem) {
//                echo "找到:" . $elem . PHP_EOL;
                return $mid;
            }
            if ($data[$mid] > $elem) {
                $high = $mid - 1;
//                echo '左边找:' . $high . PHP_EOL;
            }
            if ($data[$mid] < $elem) {
                $low = $mid + 1;
//                echo '右边边找:' . $low . PHP_EOL;
            }
        }

        return null;
    }

    /**
     * 顺序查找
     * @param  array $data
     * @param  bool $elem
     * @return string
     */
    public function searchOrder($data, $elem)
    {
        count($data);
        foreach ($data as $key => $value) {
            if ($value == $elem) {
                return $key;
            }
        }
        return null;
    }
}
