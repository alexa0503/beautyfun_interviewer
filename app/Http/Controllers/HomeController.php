<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('wechat.auth');
    }

    public function index()
    {
        return view('home');
    }
    public function lottery()
    {
        $result = array('ret'=>0,'msg'=>'');
        DB::transaction(function () {
            $info = \App\Info::find(\Session::get('info.id'));
            if( $info->has_lottery == 1 ){
                $result = array('ret'=>1001,'msg'=>'您已经抽过奖了~');
            }
            else{
                $info->has_lottery = 1;
                $rand1 = rand(1,100);
                $rand2 = rand(1,100);
                $info->has_win = $rand1 == $rand2 ? 1 : 0;
                $info->save();
            }
        });
        return \GuzzleHttp\json_encode($result);
    }
    public function post(Request $request)
    {
        $result = array('ret'=>0,'msg'=>'');
        if( null == $request->session()->get('wechat.id') ){
            $result['ret'] = 2001;
            $result['msg'] = '必须授权才能提交喔~';
        }
        elseif( !preg_match('/^1\d{10}$/', $request->input('mobile')) ){
            $result['ret'] = 1001;
            $result['msg'] = '请输入正确的手机号~';
        }
        elseif( null == $request->input('name') || "" == $request->input('name') ){
            $result['ret'] = 1002;
            $result['msg'] = '姓名不能为空~';
        }
        else{
            $count = \App\Info::where('user_id', $request->session()->get('wechat.id') )->count();
            if( $count == 0){
                $info = new \App\Info();
                $info->name = $request->input('name');
                $info->mobile = $request->input('mobile');
                $info->address = $request->input('address');
                $info->created_time = Carbon::now();
                $info->created_ip = $request->getClientIp();
                $info->save();
                $request->session()->set('info.id', $info->id);
            }
            else{
                $result['ret'] = 3001;
                $result['msg'] = '您已经提交过信息了~';
            }
        }
        return \GuzzleHttp\json_encode($result);
    }
}
