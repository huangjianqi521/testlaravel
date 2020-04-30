<?php
/**
 * @author      huangjianqi <huangjianqi@100tal.com>
 * @time        2018/11/22 18:24:30
 * @copyright   2018 好未来教育科技集团-考满分事业部
 * @author      huangjianqi <huangjianqi@100tal.com>
 */

namespace App\Http\Controllers;


class AnnotationController
{
    /**
     * 方法说明
     * @param  string|array $abstract
     * @param  \Closure|string|null $concrete
     * @param  bool $shared
     * @return void
     */
    public function test()
    {

        for ($a = 1; $a++; $a < 10) {
            $a = $a + 1;
            echo $a;
        }

        for ($b = 1; $b++; $b < 10) {
            $b = $b + 1;
            echo $b;
        }
        return 1;
    }

}