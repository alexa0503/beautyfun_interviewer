<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helper;
use Carbon\Carbon;

class WechatController extends Controller
{
    public function auth(Request $request)
    {
        $callback_url = $request->getUriForPath('/wechat/callback');
        $url = 'http://wechat.social-touch.com/index.php?controller=plugins&action=index&app=beautyplus&class=oauth2&callback_url='.$callback_url;
        return redirect($url);
    }
    public function callback(Request $request)
    {
        $openid = $request->get('openid');
        if( null == $openid || null == $request->get('nickname')){
            return view('errors/503',['error_msg' => 'openId获取不正确']);
        }
        else{
            $wechat_user = \App\WechatUser::where('open_id',$openid);
            if($wechat_user->count() > 0){
                $wechat = $wechat_user->first();
            }
            else{
                $wechat = new \App\WechatUser();
                $wechat->open_id = $openid;
                $wechat->create_time = Carbon::now();
                $wechat->create_ip = $request->getClientIp();
            }
            $nickname = urldecode($request->get('nickname'));
            $headImg = urldecode($request->get('headimgurl'));
            $sex = urldecode($request->get('sex'));
            $province = urldecode($request->get('province'));
            $city = urldecode($request->get('city'));
            $country = urldecode($request->get('country'));

            $wechat->gender = $sex;
            $wechat->head_img = $headImg;
            $wechat->nick_name = json_encode($nickname);
            $wechat->country = $country;
            $wechat->province = $province;
            $wechat->city = $city;
            //$wechat->options = $options;
            $wechat->save();
            $request->session()->set('wechat.id', $wechat->id);
            $request->session()->set('wechat.nickname', $wechat->nick_name);
            //$request->session()->set('wechat.openid', $openid);
            return redirect('/');
        }
    }
}
