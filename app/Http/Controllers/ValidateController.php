<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Model\Hello;

class ValidateController extends Controller
{
    protected $model;

    public function __construct()
    {

    }

    public function index()
    {
        $validate = 'dfsdfsdf';
        $array = [
            '',
            '帅',
            '白',
            0,
            '俊',
            false,
            '遥',
            null,
            '博',
            '客'
        ];
        $collect = collect($array);
//        dump($collect);
//        foreach ($collect as $K => $v) {
//            dump($v);
//        }
        //普通数组处理字符串
        unset($array[1]);
        dump(implode('-', array_filter($array)));//array_filter()是一个回调函数，第二个参数为空时，默认过滤掉数组中为false的数据

        //使用laravel的collection处理字符串
        // forget() 删除 '帅字'
        // filter() 过滤为假的值
        // implode() 用 - 连接
        dump($collect->forget(1)->filter()->implode('-'));

        return view('validate', ['mes' => $validate]);

    }
}
