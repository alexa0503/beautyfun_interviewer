<?php

namespace App\Http\Controllers;

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
        $level = \Session::get('wechat.level');

        return view('index');
    }
    public function level(Request $request, $id)
    {
        $wechat_user = \App\WechatUser::find(\Session::get('wechat.id'));
        if ($wechat_user->level == $id - 1) {
            $wechat_user->level = $id;
            $wechat_user->save();
        } elseif ($wechat_user->level < $id - 1) {
            return redirect('/');
        }
        $info = \App\Info::where('user_id', \Session::get('wechat.id'))->first();

        return view('level_'.$id, ['info' => $info]);
    }
    public function lottery(Request $request)
    {
        $result = ['ret' => 0, 'msg' => '', 'has_win' => 0, 'wechat.id' => \Session::get('wechat.id')];
        DB::beginTransaction();
        try {
            $date = date('Y-m-d');
            #该微信用户提交信息数 用于判断
            $count = \App\Info::where('user_id', \Session::get('wechat.id'))->count();
            #总计中奖数
            $sum = \App\Info::where('has_win', 1)->count();
            //当日已中数
            $num1 = \App\Info::where('has_win', 1)
                ->where('created_time', '>=', $date)
                ->where('created_time', '<=', $date.' 23:59:59')
                ->count();
            //今天可抽奖数量
            $num2 = 0;
            if ($date == '2016-06-25') {
                $num2 = 4;
            } elseif ($date == '2016-06-24') {
                $num2 = 3;
            } elseif ($date == '2016-06-25') {
                $num2 = 3;
            }
            $rand1 = rand(1, 1);
            $rand2 = rand(1, 1);

            //中奖
            if ($rand1 == $rand2 && $sum < 10 && $num1 < $num2) {
                $has_win = true;
            } else {
                $has_win = false;
            }
            if ($count == 0) {
                $info = new \App\Info();
                $info->created_time = Carbon::now();
                $info->created_ip = $request->ip();
                $info->user_id = \Session::get('wechat.id');

                if ($has_win) {
                    $info->has_win = 1;
                    $info->lottery_time = Carbon::now();
                    $info->lottery_ip = $request->ip();
                    \Session::set('info.id', $info->id);
                } else {
                    $info->has_win = 0;
                }
                $info->save();
                $result['has_win'] = $info->has_win;
            } else {
                $info = \App\Info::where('user_id', \Session::get('wechat.id'))->first();
                $result['has_win'] = $info->has_win;
                if ($has_win && $info->has_win == 0) {
                    $info->has_win = 1;
                    $info->lottery_time = Carbon::now();
                    $info->lottery_ip = $request->ip();
                    $info->save();
                    $result['has_win'] = 1;
                    \Session::set('info.id', $info->id);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            $result['ret'] = 2001;
            $result['msg'] = $e->getMessage();
            DB::rollback();
        }

        return \GuzzleHttp\json_encode($result);
    }
    public function post(Request $request)
    {
        $result = array('ret' => 0, 'msg' => '');
        if (null == $request->session()->get('wechat.id')) {
            $result['ret'] = 2001;
            $result['msg'] = '必须授权才能提交喔~';
        } elseif (!preg_match('/^1\d{10}$/', $request->input('mobile'))) {
            $result['ret'] = 1001;
            $result['msg'] = '请输入正确的手机号~';
        } elseif (null == $request->input('name') || '' == $request->input('name')) {
            $result['ret'] = 1002;
            $result['msg'] = '姓名不能为空~';
        } else {
            $info = \App\Info::where('user_id', \Session::get('wechat.id'))->first();
            if (null == $info->name && $info->has_win == 1) {
                $info->name = $request->input('name');
                $info->mobile = $request->input('mobile');
                $info->address = $request->input('address');
                $info->post_time = Carbon::now();
                $info->post_ip = $request->ip();
                $info->save();
            } else {
                $result['ret'] = 3001;
                $result['msg'] = '您已经提交过信息了~';
            }
        }

        return \GuzzleHttp\json_encode($result);
    }
}
