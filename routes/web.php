<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], 'validate', 'ValidateController@index');
Route::get('/queue/{data}', 'QueueTestController@test');

//Route::name('front.index')->get('/', function () {
//    return '这是首页的测试路由。';
//});

//Route::name('front.index')
//    ->middleware('auth')//中间路由
//    ->get('/','HelloController@index');

//定义资源路由（批量路由）
//Route::resource('hello', 'HelloController@index');

Route::get('hello', 'HelloController@index');
Route::get('demo', 'DemoController@demo');
Route::get('and_or', 'DemoController@andOr');
Route::get('carbon', 'DemoController@carbon');//->middleware('midTest');
Route::get('redis', 'TestRedisController@test');//->middleware('midTest');

//Route::get('basic1', function () {
//    return view('Hello World');
//});
//
//Route::post('basic2', function () {
//    return view('Hello World post');
//});

//路由重定向
//Route::redirect('/here', '/there', 301);

//视图路由
//Route::view('/hello', 'hello', ['msg' => 'Taylor'

//多请求路由
//Route::any('multy2',function(){
//    return 'multy2';
//});
//多请求路由
//Route::match('multy1',function(){
//    return 'multy1';
//});

//多个参数和路由规则时
//Route::get('user/{$id}/{$name}',function($id,$name = "sean"){
//    return $id.$name;
//})->where(['id' => '0-9+','name '=>'a-zA-Z+']);

//别名
//Rount::get('user/center',['as' =>'center',function(){
//    return "sfdsfs";
//}]);

Route::get('test', 'StudentController@index');
Route::get('query', 'StudentController@query');
Route::get('orm1', 'StudentController@orm1');
Route::get('orm2', 'StudentController@orm2');
Route::get('response', 'StudentController@response');
Route::get('student/request1', 'StudentController@request1');
//宣传页面
Route::get('activity0', 'StudentController@activity0');
//活动页面
Route::group(['middleware' => ['activity']], function () {
    Route::get('activity1', 'StudentController@activity1');
    Route::get('activity2', 'StudentController@activity2');
});


//引入session_star所在位置为Lernel.php
Route::group(['middleware' => ['web']], function () {
    Route::get('session1', 'StudentController@session1');
    Route::get('session2', 'StudentController@session2');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/date', 'DateTestController@index')->name('date');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
