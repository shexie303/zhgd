<?php
include 'vendor/autoload.php';
include '../Db.php';
include 'Event/CommEventLog.php';
include 'GPBMetadata/EventDis.php';
include 'GPBMetadata/Comm.php';

try {
  $url = 'tcp://120.27.31.232:6008'; //地址
  $stomp = new Stomp($url, 'admin', '1234567');
  $stomp->subscribe('/topic/openapi.vss.topic'); //消息队列
  
  //$start = now();
  $count = 0;
  echo "Waiting for messages...\n";
  while(true) {
      $hasFrame = $stomp->hasFrame();
      //var_dump($hasFrame);
      if ($hasFrame) {
          $frame = $stomp->readFrame();
          if ($frame) {
              if ($frame->command == "MESSAGE") {
                  echo ++$count." yes reviced message.\n";
                  //解析事件内容
                  decode_pd_msg($frame->body);
              } else {
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

        //保存
        save_to_database($log);
    } else {
        //其他处理操作...
    }
}

//保存报警事件
function save_to_database($data = null) {
    if ($data) {
        $insertData['event_name'] = $data['event_type_name'].':'.$data['event_name'];
        $insertData['event_type'] = 'video'; //视频事件
        $insertData['event_state'] = 1; //默认未处理
        $insertData['ext_info'] = json_encode($data); //序列化
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