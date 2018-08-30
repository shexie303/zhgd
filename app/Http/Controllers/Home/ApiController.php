<?php
namespace App\Http\Controllers\Home;

use App\Models\SiteElevatorLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
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
                'device_id' => $input['device_id'],
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
            $tower_crane = new SiteElevatorLogs;
            foreach($data as $k => $v){
                $tower_crane->$k = $v;
            }
            try{
                $tower_crane->save();
            }catch (\Exception $e){
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