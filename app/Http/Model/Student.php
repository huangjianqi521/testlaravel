<?php
/**
 * Created by PhpStorm.
 * User: Bruce
 * Date: 2018/9/8
 * Time: 19:34
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    //制定表名
    protected $table = 'student';

    //指定id
//    protected $primaryKey = 'id';

    //自动维护时间戳
    public $timestamps = true;
    //指定允许批量赋值的属性
//    protected $fillable = ['name', 'age'];

    //不允许批量赋值的字段
//    protected $guarded = [];

    public function getDateFormat()
    {
        return time();
//        return "Y-m-d H:i:s";
    }
//
//
    public function asDateTime($value)
    {
        return $value;
    }

}