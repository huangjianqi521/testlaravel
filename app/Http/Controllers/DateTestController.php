<?php
/**
 * 测试phpData/Time函数
 *
 * @author      huangjianqi <huangjianqi@100tal.com>
 * @time        2018/12/14 15:31:28
 *
 * @copyright   2018 好未来教育科技集团-考满分事业部
 * @license     http://www.kmf.com license
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;


class DateTestController extends Controller
{
    public $array_one = [
        "关羽",
        "张飞",
        "赵云",
        "马超",
        "黄忠"
    ];
    public $array_two = [
        "五武将" => [
            ["关羽"],
            ["张飞"],
            ["赵云"],
            ["赵云"],
            ["黄忠"]
        ],
        "文官" => [
            ["诸葛亮"],
            ["徐庶"],
            ["庞统"]
        ]
    ];
    public $array_more = [
        "武将" => [
            "五虎将" => [
                ["关羽"],
                ["张飞"],
                ["赵云"],
                ["赵云"],
                ["黄忠"]
            ]
        ]
    ];

    public $array_test = [
        "云长",
        "翼德",
        "子龙",
        "孟起",
        "汉升"
    ];

    public $array_int = [
        1,
        2,
        3,
        4,
        5
    ];


    public function __construct()
    {
    }

    public function index()
    {
        echo "<pre>";

        //1.array_keys
//        print_r(array_keys($this->array_one));
//        print_r(array_keys($this->array_two));
//        print_r(array_keys($this->array_more));

        //2.array_map
        /**
         * 1，在PHP类中通过array_map函数回调内部方法时，类名称可以使用__CLASS__常量。我们强烈推荐使用此常量，因为不论你类如何修改，这能保证最终结果都是正确的。
         *
         * 2，如果回调的方法是非静态类型，亦可通过$this伪变量指定。
         *
         * 3，在PHP类中的array_map函数总是不能识别self伪变量。
         */
//        print_r(array_map(array(__CLASS__, 'test_array_map'), $this->array_one, $this->array_test));//array_map调用类内部的方法使用示例
//        print_r(array_map(array($this, 'test_array_map'), $this->array_one, $this->array_test));

        //3.array_merge_recursive
//        print_r(array_merge_recursive($this->array_one, $this->array_two));

        //4.array_merge
//        print_r(array_merge($this->array_one, $this->array_two));

        //5.array_multisort
//        array_multisort($this->array_two);
//        print_r($this->array_two);

        //6.array_pad
//        print_r(array_pad($this->array_one, 12, "test"));

        //7.array_pop
//            print_r(array_pop($this->array_one));
//            print_r($this->array_one);
        //8.array_push
//        array_push($this->array_one,"test");
//        print_r($this->array_one);
        //9.array_product
//        print(array_product($this->array_int));
        //10.array_rand()
//        $key = array_rand($this->array_int, 2);
//        echo $this->array_one[$key[0]]."<br>";
//        echo $this->array_one[$key[1]]."<br>";

//        echo $this->function_test();
//        echo $this->funciton_test_addslashes();
        echo $this->function_test_htmlspecialchars();
    }

    public function test_array_map($a, $b)
    {
        return "我是：" . $a . "-字-" . $b . "<br>";
    }

    public function function_test_stripslashes()
    {
        $str = "Is your name O\\'reilly?";
        $res = stripslashes($str);
        return $res;
    }

    public function funciton_test_addslashes()
    {
        $str = "Is your name O'reilly?";
        $str = addslashes($str);
        return $str;
    }

    public function function_test_htmlspecialchars()
    {
        $str = htmlspecialchars("<a href='test'>Test</a>");
        return $str;


    }


}