<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\SiteErrorReport;
use App\Models\SiteErrorReportGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mrgoon\AliSms\AliSms;

class ReportController extends HomeController
{
    //消息中心 列表
    public function index(Request $request)
    {
        if ($request->method() == 'POST' && $request->ajax()) {
            $return = [
                'state' => 'fail',
                'data' => [],
                'message' => ''
            ];
            $validator = Validator::make($request->all(),[
                'reportId' => 'integer|required'
            ]);
            if($validator->fails()){
                $errors = $validator->errors()->all();
                $return['message'] = $errors[0];
                return response()->json($return);
            }
            $input = $request->all();
            $event = SiteErrorReport::find($input['reportId']);
            if (!empty($event)) {
                if ($event['event_state'] == 1 || $event['event_state'] == 2) { //处理
                    $_group = SiteErrorReportGroups::where(['type' => $event['event_state'], 'module' => $event['event_type']])->get();
                    if (count($_group) > 0) {
                        foreach ($_group as $key => $value) {
                            $group[$value['id']] = $value['id'];
                        }
                        $_user = DB::table('site_user_report_groups')->whereIn('group_id', $group)->get();
                        if (count($_user) > 0) {
                            foreach ($_user as $key => $value) {
                                $user[$value->user_id] = $value->user_id;
                            }
                            $_userData = DB::table('site_users')->whereIn('id', $user)->get();

                            $aliSms = new AliSms();
                            foreach ($_userData as $key => $value) {
                                //发送短信
                                $response = $aliSms->sendSms($value->mobile_phone, 'SMS_144147914', ['area'=> '']);
                            }
                            $return['state'] = 'success';
                            $return['message'] = '发送完成。';
                            return response()->json($return);
                        } else {
                            $return['message'] = '未找到处理人信息。';
                            return response()->json($return);
                        }
                    } else {
                        $return['message'] = '未找到处理组信息。';
                        return response()->json($return);
                    }
                } else {
                    $return['message'] = '当前信息不需要发短信。';
                    return response()->json($return);
                }
            } else {
                $return['message'] = '事件信息不存在。';
                return response()->json($return);
            }
        } else {
                        
            //获取所有报警信息
            $list = SiteErrorReport::select('id', 'event_level', 'event_name', 'event_type', 'event_state', 'created_at')->orderBy('id','desc')->offset(0)->limit(50)->get();
            foreach ($list as $key => $value) {
                $temp['id'] = $value->id;
                $temp['event_name'] = isset(SiteErrorReport::EVENT_TYPE[$value->event_type]) ? SiteErrorReport::EVENT_TYPE[$value->event_type] : '未确定';
                $temp['event_msg'] = trim($value->event_name, ':');
                $temp['event_state'] = $value->event_state;
                $temp['created_at'] = $value->created_at->format('Y-m-d H:i:s');
                $data[$key] = $temp;
            }
            return view('default/report/index', ['list' => $data]);
        }
    }
    
}