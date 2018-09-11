<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\SiteErrorReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class ReportController extends HomeController
{
    //消息中心 列表
    public function index(Request $request)
    {
        if ($request->method() == 'POST' && $request->ajax()) {
            $return = [
                'code' => 0,
                'data' => [],
                'message' => ''
            ];
            //...
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