<?php

namespace App\Http\Controllers;

//use Illuminate\Routing\Controller;
use App\Http\Model\Hello;
use Carbon\Carbon;
use Mockery\Exception;
use App\Jobs\Queue;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    protected $model;

    public function __construct(Hello $hello)
    {

        $this->model = $hello;
    }

    public function index()
    {
//        for ($i = 0; $i < 100000; $i++) {
//            SeasLog::debug('this debug:' . $i);
//            SeasLog::info('this info, hello zeopean' . $i);
//        }
//        $d = __NAMESPACE__ . '\MYCONST';
//        echo constant($d);
//        for ($i = 0; $i < 2; $i++) {
//            echo $i . "<br/>";
//            ob_flush();
//            flush();
//            sleep(1);
//        }
//        try {
//            $a = (string)"11111";
//            $b = (string)"22222";
//            $c = $a + $b;
//            foreach($c as $d){
//                echo $d;
//            }
//        } catch (Exception $e) {
//            report($e);
//            return null;
//        }
        echo 111;
        $this->dispatch(new Queue([1,2,5,4,5,66,3]));

        echo "xDEbug";
        $a = 12121;
        $b = 1212;
        $c = $a + $b;
        echo $c."<br>";
        echo base_path()."<br>";
        echo app_path()."<br>";
        echo storage_path()."<br>";
        echo public_path()."<br>";
        echo resource_path()."<br>";
        echo config_path()."<br>";
        echo database_path()."<br>";

        echo time()."<br>";
        echo Carbon::now()."<br>";
        echo date("Y-m-d H:i:s")."<br>";


        echo app('path.storage');
        \Log::info("LOG---TEST");
        \Log::error("LOG---TEST");



//        return view('hello', $this->model->index());
    }

    public function test()
    {
    }
}
