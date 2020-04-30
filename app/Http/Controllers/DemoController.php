<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    function __construct()
    {
        # code...
    }

    public function demo()
    {
        $data = ['a','b','c'];

        foreach($data as $k=>$v){

            $v = &$data[$k];
            print_r($data);

        }
        print_r($data);
        dd($data);
        $arr_1 = [
            'a' => array(
                'id' => 2135,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'test' => array(
                    'id' => 2135,
                    'first_name' => 'Joh',
                    'last_name' => 'Doe',
                ),
            ),
            'B' => array(
                'id' => 3245,
                'first_name' => 'Sally',
                'last_name' => 'Smith',
                'test' => array(
                    'id' => 2135,
                    'first_name' => 'Joh',
                    'last_name' => 'Doe',
                ),
            ),
            'C' => array(
                'id' => 5342,
                'first_name' => 'Jane',
                'last_name' => 'Jones',
                'test' => array(
                    'id' => 2135,
                    'first_name' => 'Joh',
                    'last_name' => 'Doe',
                ),
            ),
            'd' => array(
                'id' => 5623,
                'first_name' => 'Peter',
                'last_name' => 'Doe',
                'test' => array(
                    'id' => 2135,
                    'first_name' => 'Joh',
                    'last_name' => 'Doe',
                ),
            )
        ];
        $arr_2 = ['a' => 2, 1, 2, 3, 4, 1];
        $arr_3 = ['a' => 2, 'b', 2, 'c', 'd',1];
        $arr_4 = [1, 2, 3, 4];

        /**
         * array_key_first,array_key_last适用于PHP 7 >= 7.3.0，
         * 以下方法适用于 < php7 的版本
         */
        if (!function_exists("array_key_last")) {
            function array_key_last($array)
            {
                if (!is_array($array) || empty($array)) {
                    return null;
                }

                return array_keys($array)[count($array) - 1];
            }
        }

        if (!function_exists('array_key_first')) {
            function array_key_first($array)
            {
                $key = null;
                if (is_array($array)) {
                    foreach ($array as $key => $value) {
                        break;
                    }
                }

                return $key;
            }
        }

        function compare_ids($arr_2, $arr_3)
        {
            return ((bool)($arr_2['id'] - $arr_3['id']));
        }
//         dd(array_keys($arr_3));							//数组中所有的键名。

//        dd(array_key_last($arr_4));
//        dd(array_key_first($arr_4));    //数组第一个，最后一个key。报错？

//         dd(array_key_exists(8,$arr_3));					//数组中是否含有某键  索引数组的话，大于该数组则也也会返回false

         dd(array_intersect_uassoc($arr_2, $arr_3, 'strcasecmp'));		//20自定义函数后值的交集

        // dd(array_intersect_ukey($arr_2,$arr_3));			//自定义函数后键的交集

        // dd(array_intersect($arr_2,$arr_3));				//值一样的交集

        // dd(array_intersect_key($arr_2,$arr_3));			//键一样的交集

        // dd(array_intersect_assoc($arr_2,$arr_3));		//类似array_diff_assoc的系列，这个是取交集 这个是键值都需要一样

        // dd(array_flip($arr_3));							//15键值交换（注意如果有键名相同的，转换后会被重新赋值）

        // dd(array_filter($arr_3,function($var){
        // 	echo "$var"."<br/>";
        // 	if ($var == 2) {
        // 		return $var;
        // 	}

        // }));												//可以过滤数组 ，并且通过一个回调函数返回自己想要的过程。

        // dd(array_fill(1,2,34));							//填充一个数组，一个索引值，长度，填充的值。

        // dd(array_fill_keys($arr_2, 2));					//将一个数组的值为key，另一个数组或者数字为值

        // dd(array_change_key_case($arr_1,CASE_UPPER ));	//键名大写。	!!!

        // dd(array_change_key_case($arr_1,CASE_LOWER ));	//10键名小写。	!!!

        // dd(array_chunk($arr_1, 2));						//将一个数组按指定长度拆分成多个数组,原键名会被取消。

        // dd(array_column($arr_1,'first_name'));			//多维数组中，某一列的值，也就是同一层数组某一键名的所有值 ,如果多维数组中有同名键值，取最高层的数据，如果是一个数组直接返回数组。	!!!
        //dd(array_combine($arr_3,$arr_2));					//合并两个相同大小的一位数组，一个为键，一个为值。	!!!

        //dd(array_count_values($arr_1));					//6统计数组成相同值的个数，数字或者字符串，也就是只能一维数组，

        /***********array_diff_assoc(统计与多个数组的键值差集) ——————返回$arr1中 后续数组没有的键值集合（数组2～数组n中出现了一样的键值 就不包含这对键值）*****************/
        // $arr1 = array('k1' => 'v1', 'k2' => 'v2', 'k3' => 'v3');
        // $arr2 = array('s1' => 'v1', 's2' => 'v2', 'k3' => 'v3');//有和$arr1中一样的'k3' => 'v3'，函数的返回值中就不包含'k3' => 'v3'了
        // $arr3 = array('k1' => 'v1', 's2' => 'v2');//有一样的'k1' => 'v1'，返回就不包含'k1' => 'v1'了
        // $arrDiffAssoc = array_diff_assoc($arr1, $arr2, $arr3);
        // // dd($arrDiffAssoc);								//个$arr1的副本，后续的数组中出现一个键值相同的元素，就在副本中删掉这个元素，最后返回这个副本。

        // /***********array_diff(统计与多个数组的值差集) *****************/
        // $arr1 = array('k1' => 'v1', 'k2' => 'v2', 'k3' => 'v3');
        // $arr2 = array('a1' => 'v1', 'k2' => 'a2');
        // $arr3 = array('a2' => 'v2');
        // $arrDiff = array_diff($arr1, $arr2, $arr3);
        // // dd($arrDiff);									//返回：一个$arr1的副本，后续的数组中出现一个值相同的元素，就在副本中删掉这个元素，最后返回这个副本。

        // /***********array_diff_key(统计与多个数组的键差集) *****************/
        // $arr1 = array('k1' => 'v1', 'k2' => 'v2', 'k3' => 'v3');
        // $arr2 = array('k1' => 'apple', 'k2' => 'banana');//只对比键名，同键名的键值对在函数返回值中扣掉
        // $arr3 = array('a1' => 'v1');
        // $arrDiffKey = array_diff_key($arr1, $arr2, $arr3);
        // // dd($arrDiffKey);								    //返回：一个$arr1的副本，后续的数组中出现一个键相同的元素，就在副本中删掉这个元素，最后返回这个副本。

        // /***********array_diff_ukey(用自定义回调函数，统计与多个数组的键差集) *****************/
        // $arr1 = array( 'blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4 );
        // $arr2 = array( 'green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8);
        // $arrDiffUkey = array_diff_ukey($arr1, $arr2, function($k1, $k2) {
        // 													    if($k1 == $k2)
        // 													        return 0;
        // 													    else if ($k1 > $k2)
        // 													        return -1;
        // 													    else return 1;
        // 	});
        // dd($arrDiffUkey);									//可以自定义函数

        // /***********array_diff_uassoc(用自定义回调函数，统计与多个数组的键值差集) *****************/
        // $arr1 = array('blue' => 1, 'red' => 2, 'green' =>3 , 'purple' => 4);
        // $arr2 = array('green' => 5, 'blue' => 1, 'yellow' => 7, 'cyan' => 8);
        // $arrDiffUassoc = array_diff_uassoc($arr1, $arr2, function($k1, $k2) {
        // 													    if($k1 == $k2)
        // 													        return 0;
        // 													    else if ($k1 > $k2)
        // 													        return -1;
        // 													    else return 1;
        // 	});
        // dd($arrDiffUassoc);


    }

    /**
     * 交换两数的值
     * @return mixed
     */
    public function andOr()
    {
        $a = 'aba';
        $b = 'bab';
//        echo base_convert($a,10,2);
        $a = $a ^ $b;
        $b = $a ^ $b;
        $a = $a ^ $b;
        dd($a,$b);
    }

    /**
     * Carbon函数
     * @param  string|array $abstract
     * @param  \Closure|string|null $concrete
     * @param  bool $shared
     * @return void
     */
    public function carbon()
    {
        print_r(Carbon::now()->daysInMonth);

    }
}
