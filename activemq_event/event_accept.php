<?php
include 'vendor/autoload.php';
include '../Db.php';

include 'Event/CommEventLog.php';
include 'Event/TriggerResult.php';
include 'Event/CommEventTrig.php';
include 'Event/EventState.php';
include 'Event/MsgCmdType.php';

include 'GPBMetadata/EventDis.php';
include 'GPBMetadata/Comm.php';

ini_set('date.timezone', 'Asia/Shanghai');
try {
  $url = 'tcp://120.27.31.232:6008'; //地址
  $stomp = new Stomp($url, 'admin', '1234567');
  $stomp->subscribe('/topic/openapi.vss.topic'); //视频监控-消息队列
  //$stomp->subscribe('/topic/openapi.ias.topic'); //入侵报警-消息队列
  //$start = now();
  $count = 0;
  echo "Waiting for messages...\n";
  while (true) {
      $hasFrame = $stomp->hasFrame();
      //var_dump($hasFrame);
      if ($hasFrame) {
          $frame = $stomp->readFrame();
          if ($frame) {
              if ($frame->command == "MESSAGE") {
                  echo ++$count." yes reviced message.\n";
                  //解析事件内容
                  decode_pd_msg($frame->body);
                  
                  //$stomp->ack($frame);
              } else {
                  var_dump($frame);
                  echo "Unexpected frame.\n";
              }
          }
      } else {
          //echo $count." no reviced;\n";
      }
      //$count++;
  }

} catch (StompException $e) {
    echo 'fail: ',$e->getMessage();
}

//解析PD消息
function decode_pd_msg($body) {
    $to = new \Event\CommEventLog();
    $to->mergeFromString($body);  
    //事件内容整理
    if ($to->getLogId()) {
        $log['log_id']      = $to->getLogId();
        $log['event_state'] = $to->getEventState();
        $log['event_level'] = $to->getEventLevel();
        $log['unit_idx']    = $to->getUnitIdx();
        $log['event_type']  = $to->getEventType();
        $log['event_type_name'] = $to->getEventTypeName();
        $log['event_name']  = $to->getEventName();
        $log['start_time']  = $to->getStartTime();
        $log['stop_time']   = $to->getStopTime();
        $log['source_idx']  = $to->getSourceIdx();
        $log['source_type'] = $to->getSourceType();
        $log['source_name'] = $to->getSourceName();
        $log['log_txt']     = $to->getLogTxt();        
        $log['region_idx']  = $to->getRegionIdx();
        $log['user_id']     = $to->getUserId();
        $log['ext_info']    = $to->getExtInfo();
        $log['rslt_msg']    = $to->getRsltMsg();
        $log['trig_info']   = $to->getTrigInfo();
        
        foreach ($log as $key => $value) {
            $log[$key] = !empty($value) ? $value : '';
        }
        
        //说明是联动信息，进入区域，热成像：暂时不必和表中已有记录整合，因为联动提供的图片地址在XML中已包含。
        //此处，严格来写，应为利用log_id验证数据表中是否已有记录。但这2项验证，也能验证是否为联动
        if (empty($log['event_type']) && is_object($log['rslt_msg'])) {
            //var_dump($log['rslt_msg']->getTriggerInfo());
//             $db = new \DB();
//             $where = "event_log_id = '{$log['log_id']}'";
//             $res = $db->table('site_error_report')->where($where)->limit(1)->select('id, event_log_id, ext_info');
//             if ($res) {
//                 if ($res[0][2]) { //ext_info
//                     //...
//                 }
//             }
        } else {
            //保存
            save_to_database($log);
        }        
    } else {
        //其他处理操作...
    }
}

//保存报警事件
function save_to_database($data = null) {
    if ($data) {
        $insertData['event_level'] = 1; //报警级别
        $insertData['event_msg'] = $data['event_type_name'];
        $insertData['event_type'] = 'video'; //视频事件
        $insertData['event_state'] = 1; //默认未处理
        $insertData['event_log_id'] = $data['log_id'];
        $insertData['ext_info'] = serialize($data); //序列化
        $insertData['created_at'] = date('Y-m-d H:i:s');
        $insertData['updated_at'] = date('Y-m-d H:i:s');
        
        $db = new \DB();
        //保存
        $db->table('site_error_report')->insert($insertData);
    }
}

//当前时间
function now() {
    list($usec,$sec) = explode(' ', microtime());
    return ((float)$usec + (float)$sec);
}