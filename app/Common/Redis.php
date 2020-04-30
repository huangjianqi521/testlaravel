<?php
/**
 *
 * @package   gmat
 * @filename  Redis.php
 * @author    renyineng <renyineng@enhance.cn>
 * @license   http://www.kaomanfen.com/ kaomanfen license
 * @datetime  16/11/14 下午3:09
 */

namespace App\Common;

use Illuminate\Support\Facades\Redis as Predis;

class Redis extends Predis
{
    public static function setex($key, $value, $expire = 0)
    {
        return Predis::setex($key, $expire, json_encode($value));

    }

    public static function set($key, $value)
    {
        return Predis::set($key, json_encode($value));

    }

    public static function get($key)
    {
        //临时限制redis返回
        if(!env('REDIS_STATUS', true)){
            return false;
        }
        $value = Predis::get($key);
        return json_decode($value, true);
    }

    public static function del($key)
    {
        return Predis::del($key);
    }

    public static function zadd($key, $score, $value)
    {
        return Predis::zadd($key, $score, $value);
    }

    public static function zCard($key)
    {
        return Predis::zCard($key);
    }

    public static function zScore($key, $member)
    {
        return Predis::zScore($key, $member);
    }

    public static function zRevrange($key, $start = 0, $end = -1, $options = [])
    {
        return Predis::zRevrange($key, $start, $end, $options);
    }

    public static function zCount($key, $start, $end)
    {
        return Predis::zCount($key, $start, $end);
    }

    public static function hGet($key, $field)
    {
        $value = Predis::hGet($key, $field);
        return json_decode($value, true);
    }

    public static function hKeys($key)
    {
        return Predis::hkeys($key);
    }

    public static function hSet($key, $field, $value)
    {
        return Predis::hSet($key, $field, json_encode($value));
    }

    public static function hDel($key,$field){
        return Predis::hDel($key, $field);
    }

    public static function zrevrank($key, $member)
    {
        return Predis::zrevrank($key, $member);
    }

    public static function incr($key)
    {
        return Predis::incr($key);
    }

    public static function hIncrBy($key, $value, $member)
    {
        return Predis::hIncrBy($key, $value, $member);
    }

    public static function rPush($key, $value)
    {
        return Predis::rPush($key, json_encode($value));
    }

    public static function lPop($key)
    {
        return Predis::lPop($key);
    }

    public static function expire($key, $expire)
    {
        return Predis::expire($key, $expire);
    }

    public static function ttl($key)
    {
        return Predis::ttl($key);
    }

    public static function hGetAll($key)
    {
        return Predis::hgetall($key);
    }

    public static function hMset($key, $array)
    {
        return Predis::hMset($key, $array);
    }

    public static function exists($key)
    {
        return Predis::exists($key);
    }

    public static function lLen($key)
    {
        return Predis::lLen($key);

    }
}