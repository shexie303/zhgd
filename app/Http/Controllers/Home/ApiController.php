<?php
namespace App\Http\Controllers\Home;

use App\Models\SiteDevices;
use App\Models\SiteElevatorLogs;
use App\Models\SiteErrorReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * 塔吊数据接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function towerCrane(Request $request)
    {
        $return = [
            'code' => 0
        ];
        if($request->method() == 'POST'){
            $validator = Validator::make($input = $request->all(),[
                'signature' => 'required',
                'device_id' => 'required',
                'height' => 'required',
                'height_warning' => 'required',
                'range' => 'required',
                'range_warning' => 'required',
                'angle' => 'required',
                'angle_warning' => 'required',
                'weight' => 'required',
                'weight_warning' => 'required',
                'moment' => 'required',
                'moment_warning' => 'required',
                'wind_speed' => 'required',
                'wind_speed_warning' => 'required',
                'dip_angle' => 'required',
                'dip_angle_warning' => 'required',
                'nonce' => 'required',
            ]);
            if($validator->fails()){
                $return['code'] = 1003;
                return response()->json($return);
            }
            if(!$this->checkSignature($input)){
                $return['code'] = 1001;
                return response()->json($return);
            }
            $data = [
                'number' => $input['device_id'],
                'height' => $input['height'],
                'height_warning' => (int) $input['height_warning'],
                'range' => $input['range'],
                'range_warning' => (int) $input['range_warning'],
                'angle' => $input['angle'],
                'angle_warning' => (int) $input['angle_warning'],
                'weight' => $input['weight'],
                'weight_warning' => (int) $input['weight_warning'],
                'moment' => $input['moment'],
                'moment_warning' => (int) $input['moment_warning'],
                'wind_speed' => $input['wind_speed'],
                'wind_speed_warning' => (int) $input['wind_speed_warning'],
                'dip_angle' => $input['dip_angle'],
                'dip_angle_warning' => (int) $input['dip_angle_warning'],
            ];
            Log::error('towerCrane',$request->all());
            try{
                $warning = [];
                $tower_crane = new SiteElevatorLogs;
                $warning_type = SiteElevatorLogs::WARNING_TYPES;
                $device = SiteDevices::where(['number' => $data['number'], 'type' => 'tower', 'construction_id' => 1])->first();
                if(!$device){
                    $return['code'] = 1000;
                    return response()->json($return);
                }
                foreach($data as $k => $v){
                    $tower_crane->$k = $v;
                    if(is_int($v) && $v == 1){
                        $warning_k = str_replace('_warning','',$k);
                        $warning[] = [
                            'event_level' => 3,
                            'event_name' => $device->name.$warning_type[$k].'达到'.$data[$warning_k],
                            'event_type' => 'tower',
                            'ext_info' => serialize([$warning_k => $data[$warning_k]])
                        ];
                    }
                }
                $tower_crane->save();
                if($warning){
                    $created_at = date('Y-m-d H:i:s', time());
                    foreach($warning as $key => $val){
                        $warning[$key]['event_log_id'] = $tower_crane->id;
                        $warning[$key]['created_at'] = $created_at;
                    }
                    SiteErrorReport::insert($warning);
                }
            }catch (\Exception $e){
                $return['code'] = 1000;
            }
        }else{
            $return['code'] = 1002;
        }
        return response()->json($return);
    }

    /**
     * 升降机数据接口
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function elevator(Request $request)
    {
        $return = [
            'code' => 0
        ];
        if($request->method() == 'POST'){
            $validator = Validator::make($input = $request->all(),[
                'signature' => 'required',
                'device_id' => 'required',
                'height' => 'required',
                'height_warning' => 'required',
                'weight' => 'required',
                'weight_warning' => 'required',
                'wind_speed' => 'required',
                'wind_speed_warning' => 'required',
                'speed' => 'required',
                'speed_warning' => 'required',
                'nonce' => 'required',
            ]);
            if($validator->fails()){
                $return['code'] = 1003;
                return response()->json($return);
            }
            if(!$this->checkSignature($input)){
                $return['code'] = 1001;
                return response()->json($return);
            }
            $data = [
                'number' => $input['device_id'],
                'type' => 2,
                'height' => $input['height'],
                'height_warning' => (int) $input['height_warning'],
                'weight' => $input['weight'],
                'weight_warning' => (int) $input['weight_warning'],
                'speed' => $input['speed'],
                'speed_warning' => (int) $input['speed_warning'],
                'wind_speed' => $input['wind_speed'],
                'wind_speed_warning' => (int) $input['wind_speed_warning']
            ];
            try{
                $warning = [];
                $elevator = new SiteElevatorLogs;
                $warning_type = SiteElevatorLogs::WARNING_TYPES;
                $device = SiteDevices::where(['number' => $data['number'], 'type' => 'elevator', 'construction_id' => 1])->first();
                if(!$device){
                    $return['code'] = 1000;
                    return response()->json($return);
                }
                foreach($data as $k => $v){
                    $elevator->$k = $v;
                    if(is_int($v) && $v == 1){
                        $warning_k = str_replace('_warning','',$k);
                        $warning[] = [
                            'event_level' => 3,
                            'event_name' => $device->name.$warning_type[$k].'达到'.$data[$warning_k],
                            'event_type' => 'elevator',
                            'ext_info' => serialize([$warning_k => $data[$warning_k]])
                        ];
                    }
                }
                $elevator->save();
                if($warning){
                    $created_at = date('Y-m-d H:i:s', time());
                    foreach($warning as $key => $val){
                        $warning[$key]['event_log_id'] = $elevator->id;
                        $warning[$key]['created_at'] = $created_at;
                    }
                    SiteErrorReport::insert($warning);
                }
            }catch (\Exception $e){
                $return['code'] = 1000;
            }
        }else{
            $return['code'] = 1002;
        }
        return response()->json($return);
    }

    /**
     * 塔吊&&升降机设备检测是否在线
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function teOffline(Request $request)
    {
        $return = [
            'code' => 0
        ];
        if($request->method() == 'POST'){
            $validator = Validator::make($input = $request->all(),[
                'signature' => 'required',
                'device_id' => 'required',
                'device_type' => 'required', //1-塔吊 2-升降机
                'nonce' => 'required',
            ]);
            if($validator->fails()){
                $return['code'] = 1003;
                return response()->json($return);
            }
            if(!$this->checkSignature($input)){
                $return['code'] = 1001;
                return response()->json($return);
            }
            $data = [
                'number' => $input['device_id'],
                'type' => $input['device_type'],
            ];
            try{

                if($data['type'] == 1){
                    $type = 'tower';
                }else{
                    $type = 'elevator';
                }
                $device = SiteDevices::where(['number' => $data['number'], 'type' => $type, 'construction_id' => 1])->first();
                if(!$device){
                    $return['code'] = 1000;
                    return response()->json($return);
                }
                $obj = new SiteElevatorLogs;
                $obj->number = $data['number'];
                $obj->type = $data['type'];
                $obj->online = 2;
                $obj->save();
                $warning = [
                    'event_level' => 3,
                    'event_name' => $device->name.'设备离线',
                    'event_type' => $type,
                    'ext_info' => serialize([$data['number'] => 'offline']),
                    'event_log_id' => $obj->id,
                    'created_at' => date('Y-m-d H:i:s', time())
                ];
                SiteErrorReport::insert($warning);
            }catch (\Exception $e){
                var_dump($e->getMessage(),$e->getLine());
                $return['code'] = 1000;
            }
        }else{
            $return['code'] = 1002;
        }
        return response()->json($return);
    }

    protected function checkSignature($params)
    {
        if(!is_array($params)){
            return false;
        }
        $signature = $params['signature'];
        unset($params['signature']);
        sort($params, SORT_STRING);
        $server_signature = md5(md5(implode($params)).'hgd@jfkj#))400');
        return $server_signature === $signature;
    }
}