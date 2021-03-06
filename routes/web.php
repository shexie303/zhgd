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

Route::group(['namespace' => 'Home'], function () {
    Route::get('/auth/login', 'AuthController@login');
    Route::post('/auth/login', 'AuthController@login');
    Route::get('/auth/logout', 'AuthController@logout');
    Route::get('/menu', 'AuthController@menu');

    Route::middleware('home')->group(function() {
        //主页
        Route::get('/', 'IndexController@index');
        //电力控制
        Route::get('/electric', 'ElectricController@index');
        //塔吊&升降机
        Route::get('/elevator', 'ElevatorController@index');
        //人员信息
        Route::get('/userinfo', 'UserInfoController@index');
        //视频监控
        Route::get('/video', 'VideoController@index');
        //门禁管控
        Route::get('/door', 'DoorController@index');
        //环境
        Route::get('/env', 'EnvController@index');
    });
    //塔吊 api
    Route::get('/api/tower_crane', 'ApiController@towerCrane');
    Route::post('/api/tower_crane', 'ApiController@towerCrane');
    //升降机 api
    Route::get('/api/elevator', 'ApiController@elevator');
    Route::post('/api/elevator', 'ApiController@elevator');
    //塔吊&升降机设备掉线通知
    Route::get('/api/te_offline', 'ApiController@teOffline');
    Route::post('/api/te_offline', 'ApiController@teOffline');
    //消息中心
    Route::get('/report', 'ReportController@index');
    Route::post('/report', 'ReportController@index');
    Route::get('/api/get_report_groups', 'ApiController@getReportGroups'); //根据事件 id，获取报警短信组
});

