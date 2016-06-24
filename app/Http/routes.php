<?php

/*
Route::group(['middleware' => ['web','wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料
        dd($user);
    });
    //Route::get('/', 'HomeController@index');
});
Route::any('/wechat', 'WechatController@serve');
*/
Route::get('/', 'HomeController@index');
Route::get('level/{id}', 'HomeController@level');
Route::post('/post', 'HomeController@post');
Route::any('/lottery', 'HomeController@lottery');
Route::any('login', function () {
    $user = \App\WechatUser::find(1);
    \Session::set('wechat.id', $user->id);
    \Session::set('wechat.level', $user->level);

    return redirect('/');
});
Route::any('logout', function () {
    //$user = \App\WechatUser::find(1);
    \Session::set('wechat', null);
    //\Session::set('wechat.level', $user->level);
    return redirect('/');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::auth();
//登录登出
Route::get('cms/login', 'Auth\AuthController@getLogin');
Route::post('cms/login', 'Auth\AuthController@postLogin');
Route::get('cms/logout', 'Auth\AuthController@logout');
//屏蔽注册路由
Route::any('/register', function () {

});
//Route::get('/register', 'Auth\AuthController@getRegister');
//Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/home', 'HomeController@index');
Route::get('/cms', 'CmsController@index');
Route::get('/cms/users', 'CmsController@users');
Route::get('/cms/account', 'CmsController@account');
Route::post('/cms/account', 'CmsController@accountPost');
Route::get('/cms/wechat', 'CmsController@wechat');
Route::get('/cms/wechat/export', 'CmsController@wechatExport');
Route::get('/cms/wechat/{id}', 'CmsController@wechat');
Route::get('/cms/user/logs', 'CmsController@userLogs');
Route::get('/cms/infos', 'CmsController@infos');
Route::get('/cms/infos/has_win', 'CmsController@infos');
Route::get('/cms/infos/export', 'CmsController@infosExport');

//wechat auth
Route::any('/wechat/auth', 'WechatController@auth');
Route::any('/wechat/callback', 'WechatController@callback');
//初始化后台帐号
Route::get('cms/account/install', function () {
    if (0 == \App\User::count()) {
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin123');
        $user->save();
    }

    return redirect('/cms');
});
