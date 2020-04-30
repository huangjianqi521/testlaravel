<?php
/**
 * Created by PhpStorm.
 * User: Bruce
 * Date: 2018/9/8
 * Time: 19:34
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Hello extends Model {

    public function index() {

        return ['msg' => 'hello World!'];

    }

}