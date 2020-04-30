<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Model\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Dotenv\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Http\Controllers\DateTime;

class StudentController extends Controller
{
    public function index()
    {

//        unset($obj->date);
//        $res = DB::select('select * from student ');
//        $res = DB::insert('insert into student(name,age) values("张飞",18)');
//        $res = DB::update('update student set age=20 where name="张飞"');
//        $res = DB::delete('delete from student where age=18');

//        $res = DB::table('student')->insertGetId(
//            ['name'=> "关羽",'age' => '18']
//        );
//        $res = DB::table('student')->insert([
//            ['name'=> "黄忠",'age' => '28'],
//            ['name'=> "赵云",'age' => '18']
//        ]);
//        $res = DB::table('student')
//            ->where('name' , "赵云")
//            ->update(['age' => 30]);
//        $res = DB::table('student')
//            ->where('id','>=',1002)
//            ->get();
//        $res = DB::table('student')
//            ->whereRaw('id>=? and age>?',[1002,18])
//            ->get();
//        var_dump($res);
        //返回某个值
//        $res = DB::table('student')
//            ->pluck('name');
//        $res = DB::table('student')
//            ->pluck('name','id');
//        $res = DB::table('student')
//            ->select('id','name','age')
//            ->get();
//        echo "<pre>";
//        DB::table('student')->chunk(2,function($students){
//            var_dump($students);
//
//        });
    }

    /**
     * 方法说明
     * @param  string|array $abstract
     * @param  \Closure|string|null $concrete
     * @param  bool $shared
     * @return void
     */
    public function query()
    {
//        $num = DB::table('student')->count();
//        $num = DB::table('student')->max('age');
//        $num = DB::table('student')->min('age');
//        $num = DB::table('student')->avg('age');
//        $num = Student::sum('age');
//        $stu = new Student();
//        $stu->name = "test";
//        $stu->age = 20;
//        $stu->save();
//        $res = Student::where(['id'=>13])->select('updated_at')->get();
//        $time = Carbon::parse('1546498080')->format("Y-m-d H:m:s");//$res[0]['updated_at']
        $time = Carbon::createFromTimestamp('1546498080')->toDateTimeString();
        echo ($time);
        echo "<br>";
//        dd(Carbon::today()->toDateTimeString());
//        dd(\Carbon\Carbon::parse($res[0]['updated_at']));
//        $mes = json_decode($res);
//        dd($mes[0]->updated_at);
//        $res->name = "黄建琪";
//
//        $res->update();
//       dd($res);
//        echo "test";
    }

    public function orm1()
    {
        //查询所有
//        $students = Student::all();
//        $students = Student::find(1003);
//        $students = Student::findOrFail(1000);//失败则报错
//        $students = Student::get();
//        $students = Student::where('id','>','1001')
//            ->orderBy('age','desc')
//            ->first();
//        echo "<pre>";
//        Student;;chunk_split(2,function($students){
//            var_dump($students);
//        });
//        $num = Student::count();

        $students = Student::where('id', '>', '1')->get();//->max('name');
        $c = json_encode($students);
        Log::info("this is a log info:".$c);
        Log::error("this is a log error:".$c);

    }

    public function orm2()
    {
//        $student = new Student();
//        $student->name = "刘备";
//        $student->age = 18;
//        $bool = $student->save();
        $student = Student::find(1007);
//        dd($student->created_at);
//        echo date('Y-m-d H:i:s',$student->created_at);

        //使用creste方法新增数据
//        $student = Student::create(
//            ['name'=>'imooc','age'=>18]
//        );
//        $student = Student::firstOrCreate(
//            ['name' => 'imooc']
//        );

//        $student = Student::firstOrNew(
//            ['name' => 'imooc']
//        );
//        $save = $student->save();
//        dd($save);

        //批量更新
//        $num = Student::where('id','>',1007)
//            ->update(['age' => 41]);
//        var_dump($num);

        //通过模型删除
//        $student = Student::find(1007);
//        $bool = $student->delete();
        //通过主键删除
//        $num = Student::destroy(10007);
//        $num = Student::destroy(10007.1008);
//        $num = Student::destroy([1006,1007]);
        //删除指定条件的数据
//        Student::where('id','>','1007')->delete();

    }

    public function request1(Request $request)
    {
//        echo $request->input('name');
//        echo $request->input('sex','未知');

//        if($request->has('name')){
//            echo $request->input('name');
//        }else{
//            echo "未知";
//        }
//        $request->all();
//    if($request->isMethod('POST')){
//        echo "POST";;
//    }
//        echo $request->method();
//        echo $request->ajax();
//    $res = $request->is('student/*');
//    var_dump($res);

        echo $request->url();

    }

    public function session1(Request $request)
    {
        //1.HTTP Request session()
//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');
        //2.session()
//        session()->put('key2','value2');
//        echo session()->get('key2');
        //3.session
//        Session::put('key3','vallue3');
//        echo Session::get('key3');
        //不存在则取默认值
//        echo Session::get('key4','default');
        //数组形式存值
//        Session::put(['key4'=>'value4']);
//数据存到session数组中
//        Session::push('student','huang');
//        Session::push('student','huangjianqi');
        //取出数据并删除，第一次取有值，第二次以后就没有值了
//        $res1 = Session::pull('key3','default');
//        var_dump($res1);

        //取出多有数据
//        $res = Session::all();
//        dd($res);
        //判断是否存在
//        if(Session::has('key1')){
//            $res = Session::all();
//            echo "<pre>";
//            var_dump($res);
//        }else{
//            echo "不存在";
//        }
        //删除制定值
//        Session::forget('key2');

        //清空所有session信息
//        Session::flush();
//        $res = Session::all();
//        dd($res);
        //暂存数据
//        Sesson::flash('key-flash','val-flash');


    }

    public function session2(Request $request)
    {
//        $res = Session::all();
        $res = Session::get('message');
        dd($res);


    }

    public function response()
    {
        //响应json
//        $data=[
//          'error'=>0,
//          'errMsg' => 'success',
//          'data'=>'huang',
//        ];
//        return response()->json($data);

        //重定向
//        return redirect('session2')->with('message','我是快闪数据');//with为携带的参数
//        return redirect()->action('StudentController@session2')->with('message','我是快闪数据');
//        return redirect()->route('session2')->with('message','我是快闪数据');
//        return redirect()->back();

    }


    public function activity0(){
        $a = 1;
        $b = 1;
        $c = $a + $b;
        echo $c;
        return "活动快要开始啦，尽情期待";
    }
    public function activity1(){

        return "互动进行中";
    }
    public function activity2(){

        return "活动开始了";
    }
}
