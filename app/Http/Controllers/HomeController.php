<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Mockery\CountValidator\Exception;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('wechat.auth');
    }

    public function index()
    {
        $info = \App\Info::where('user_id', \Session::get('wechat.id') )->first();
        return view('home', ['info'=>$info]);
    }
    public function lottery(Request $request)
    {
        $result = ['ret'=>0,'msg'=>'','has_win'=>0];
        DB::beginTransaction();
        try{
            $count = \App\Info::where('user_id', \Session::get('wechat.id') )->count();
            $rand1 = rand(1,5);
            $rand2 = rand(1,5);
            if( $count == 0){
                $info = new \App\Info();
                $info->name = nullValue();
                $info->mobile = nullValue();
                $info->address = nullValue();
                $info->created_time = Carbon::now();
                $info->created_ip = $request->ip();
                $info->user_id = \Session::get('wechat.id');

                if( $rand1 == $rand2 ){
                    $info->has_win = 1;
                    $info->lottery_time = Carbon::now();
                    $info->lottery_ip = $request->ip();
                }
                else{
                    $info->has_win = 0;
                    $info->lottery_time = nullValue();
                    $info->lottery_ip = nullValue();
                }
                $info->save();
                if( $info->has_win = 1 )
                    \Session::set('info.id', $info->id);
                $result['has_win'] = $info->has_win;
            }
            else{
                $info = \App\Info::where('user_id', \Session::get('wechat.id') )->first();
                $result['has_win'] = $info->has_win;
                if( $rand1 == $rand2 && $info->has_win == 0){
                    $info->has_win = 1;
                    $info->lottery_time = Carbon::now();
                    $info->lottery_ip = $request->ip();
                    $info->save();
                    $result['has_win'] = 1;
                    \Session::set('info.id', $info->id);
                }

            }
            DB::commit();
        }catch (Exception $e){
            $result['ret'] = 2001;
            $result['msg'] = $e->getMessage();
            DB::rollback();
        }
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
            $info = \App\Info::find(\Session::get('info.id'));
            if( null != $request->input('name') && '' != $request->input('name')){
                $info->name = $request->input('name');
                $info->mobile = $request->input('mobile');
                $info->address = $request->input('address');
                $info->post_time = Carbon::now();
                $info->post_ip = $request->ip();
                $info->save();
            }
            else{
                $result['ret'] = 3001;
                $result['msg'] = '您已经提交过信息了~';
            }
        }
        return \GuzzleHttp\json_encode($result);
    }
}
