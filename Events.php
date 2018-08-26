<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use \GatewayWorker\Lib\Gateway;
use Workerman\Lib\Timer;

/**
 *
 *路径，需要根据各自本地情况，重新设置。如果GatewayWorker和zhgd文件夹在同一级，则不需要设置。
 *数据库，连接的具体配置需要，在Db.php根据各自情况配置，同zhgd/config/database.php一致
 */
require_once __DIR__.'/../../../zxgd/Db.php';
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{
    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     * 
     * @param int $client_id 连接id

    public static function onConnect($client_id)
    {
        // 向当前client_id发送数据 
        Gateway::sendToClient($client_id, "Hello $client_id\r\n");
        // 向所有人发送
        Gateway::sendToAll("$client_id login\r\n");
    }*/
    
   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $message)
   {
       $return['state'] = 'error';
	   $return['msg'] = '';
	   $return['data'] = '';
	   
	   if (empty($message)) { //如果没有参数，则报错。
		   $return['message'] = 'Parameter can not be empty.';
		   Gateway::sendToClient($client_id, json_encode($return));
	   } else {
		   $messageDecode = json_decode($message, true);
		   //先暂定，按type字段，来区分是哪个模块的请求。具体怎么定，先过了明天再定！
		   if ($messageDecode['type'] == 'electric') { //@路超，电力部分。
			   // 向某客户端发送
			   Timer::add(5, function($client_id) {
                   $return['state'] = 'success';
                   $a = mt_rand(200,250);
                   $return['data'] = [
                       mt_rand(120,145),
                       mt_rand(120,145),
                       $a,
                       270-$a
				   ];
				   Gateway::sendToClient($client_id,json_encode($return));
			   },[$client_id],true);
			   
		   } elseif ($messageDecode['type'] == 'electric_second') {
               // 向某客户端发送
               Timer::add(30, function($client_id) {
                   $return['state'] = 'success';
                   $return['data'] = [
                       ['工作区设备1',mt_rand(399,415)+ mt_rand(0,9)/10,0,0,0],
                       ['工作区设备2',0,0,0,0],
                       ['工作区设备3',mt_rand(399,415)+ mt_rand(0,9)/10,0,0,0],
                       ['工作区设备4',0,0,0,0],
                       ['生活区设备1',0,0,0,0]
                   ];
                   Gateway::sendToClient($client_id,json_encode($return));
               },[$client_id],true);
           } elseif ($messageDecode['type'] == 'env') { //@路超，环境部分
               Timer::add(60, function($client_id) {
                   $return['state'] = 'success';
                   //查询
                   $db = new \DB();
                   $data = $db->table('site_env')->order('id desc')->limit('1')->select('pm10,wind_sc,tmp,hum');
                   if ($data) {
                       $return['data'] = $data[0]; //发生视频报警事件
                   }
                   // 向某客户端发送
                   Gateway::sendToClient($client_id, json_encode($return));
               }, [$client_id], true);
		   } elseif ($messageDecode['type'] == 'video') { //@陈振华，视频部分，目前是报警事件。
				
				Timer::add(10, function($client_id) {
					$return['state'] = 'success';
					//查询
					$db = new \DB();
					$report = $db->table('site_error_report')->where("event_state = 1 and event_type = 'video'")->order('id desc')->limit('1')->select('id, event_name');
					$return['data']['report'] = 2; //没有视频报警事件
					$return['data']['report_msg'] = ''; 
					if ($report) {
						$return['data']['report'] = 1; //发生视频报警事件
						$return['data']['report_msg'] = trim($report[0][1], ':'); //报警事件描述
					}
					// 向某客户端发送
					Gateway::sendToClient($client_id, json_encode($return));
			   }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'video_list') { //@陈振华，视频报警列表页。
				
				Timer::add(10, function($client_id) {
					$return['state'] = 'success';
					//查询
					$db = new \DB();
					$where = "event_state = 1 and event_type = 'video' and created_at > ".date('Y-m-d 00:00:00');
					$report = $db->table('site_error_report')->where()->order('id desc')->select('id, event_name, ext_info');
					$return['data']['report_sum'] = 0; //没有视频报警事件
					$return['data']['report_list'] = array();
					if ($report) {
						$return['data']['report_sum'] = count($report); //发生视频报警事件总数
						foreach ($report as $key => $value) {
						    //报警事件描述
						    $temp['name'] =  trim($value[1], ':');
						    //报警图片
						    $extInfo = unserialize($value[2]);
						    if ($extInfo['ext_info']) { //解析XML
						        $xmlString = $extInfo['ext_info'];
						        $parser = xml_parser_create();
                                xml_parse_into_struct($parser, $xmlString, $vals, $keys);
                                xml_parser_free($parser);
                                $picUrl = $vals[$keys['PICURL'][0]]['value'];
                                $picUrlArray = explode(';', $picUrl);
                                if (is_array($picUrlArray)) {
                                    foreach ($picUrlArray as $k => $v) {
                                        $temp['pic_url'] = 'http://120.27.31.232:6025'.$v; //只取一张
                                    }
                                }
						    } else {
						        $temp['pic_url'] = '';
						    }
						    
						    $return['data']['report_list'][$key] = $temp;
						}
					}
					// 向某客户端发送
					Gateway::sendToClient($client_id, json_encode($return));
			   }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'user_info') { //@陈振华，人员定位。
				$return['state'] = 'success';
			   // 向某客户端发送
			   Timer::add(15, function($client_id) {
				   $return['data']['yuejie'] = mt_rand(2,5); //越界
				   $return['data']['diaoxian'] = mt_rand(1,4); //掉线
				   $return['data']['didian'] = mt_rand(2,9); //低电
				   $return['data']['stop'] = mt_rand(1,7); //长时间静止
				   
				   $return['data']['sum'] = $return['data']['yuejie']+$return['data']['diaoxian']+$return['data']['didian']+$return['data']['stop']; //汇总
				   Gateway::sendToClient($client_id, json_encode($return));
			   }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'user_info_second') { //@陈振华，人员定位二级。


           } else {
				$return['message'] = 'unsure type';
				Gateway::sendToClient($client_id, json_encode($return));
		   }
	   }
	   
   }
   
   /**
    * 当用户断开连接时触发
    * @param int $client_id 连接id
    */
   public static function onClose($client_id)
   {
       // 向所有人发送 
//       GateWay::sendToAll("$client_id logout\r\n");
//       echo "$client_id logout\r\n";
   }
}
