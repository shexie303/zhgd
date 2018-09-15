<?php
namespace App\Http\Controllers\Home;

use App\Models\SiteDevices;
use App\Models\SiteElevatorLogs;
use Illuminate\Http\Request;

class ElevatorController extends HomeController
{
    public function Index(Request $request)
    {
        $type = (int) $request->input('type');
        $id = (int) $request->input('id');
        if($type == 2){
            //升降机
            $number_arr = [];
            $devices = SiteDevices::where(['type' => 'elevator', 'construction_id' => session('login_user_constructions_id')])->get();
            foreach($devices as $key => $val){
                $number_arr[$val->id] = $val->number;
                if($id){
                    if($id == $val->id){
                        $val->current = 1;
                    }else{
                        $val->current = 0;
                    }
                }else{
                    if($key > 0){
                        $val->current = 0;
                    }else{
                        $val->current = 1;
                    }
                }
                $val->url = '/elevator?type=2&id='.$val->id;
            }
            if(!$id){
                $id = $devices[0]->id;
            }
            $map = ['number' => $number_arr[$id], 'type' =>$type];
            $data = SiteElevatorLogs::where($map)->orderBy('id', 'desc')->first();
            if(!$data){
                $data = new \stdClass();
                $data->weight = 0;
                $data->height = 0;
                $data->wind_speed = 0;
                $data->speed = 0;
                $data->online = 2;
            }
            return view(self::HOME_VIEW_PREFIX . '/elevator/elevator', ['ws' => $map, 'devices' => $devices, 'data' => $data]);
        }else{
            //塔吊
            $number_arr = [];
            $devices = SiteDevices::where(['type' => 'tower', 'construction_id' => session('login_user_constructions_id')])->get();
            foreach($devices as $key => $val){
                $number_arr[$val->id] = $val->number;
                if($id){
                    if($id == $val->id){
                        $val->current = 1;
                    }else{
                        $val->current = 0;
                    }
                }else{
                    if($key > 0){
                        $val->current = 0;
                    }else{
                        $val->current = 1;
                    }
                }
                $val->url = '/elevator?type=1&id='.$val->id;
            }
            if(!$id){
                $id = $devices[0]->id;
            }
            $map = ['number' => $number_arr[$id], 'type' =>$type];
            $data = SiteElevatorLogs::where($map)->orderBy('id', 'desc')->first();
            if(!$data){
                $data = new \stdClass();
                $data->weight = 0;
                $data->height = 0;
                $data->range = 0;
                $data->moment = 0;
                $data->wind_speed = 0;
                $data->angle = 0;
                $data->dip_angle = 0;
                $data->online = 2;
            }
            return view(self::HOME_VIEW_PREFIX . '/elevator/index', ['ws' => $map, 'devices' => $devices, 'data' => $data]);
        }
    }

}