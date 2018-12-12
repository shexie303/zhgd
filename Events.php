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
require_once __DIR__.'/../../../jinfang/Db.php';
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
		   //先暂定，按type字段，来区分是哪个模块的请求。
		   if ($messageDecode['type'] == 'electric') { //@路超，首页电力部分
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
			   
		   } elseif ($messageDecode['type'] == 'electric_second') { //@路超，电力二级页面部分
               // 向某客户端发送
               Timer::add(30, function($client_id) {
                   $return['state'] = 'success';
                   $return['data'] = [
                       ['工作区设备1',0,0,0,0],
                       ['工作区设备2',0,0,0,0],
                       ['工作区设备3',0,0,0,0],
                       ['工作区设备4',0,0,0,0],
                       ['生活区设备1',mt_rand(399,415)+ mt_rand(0,9)/10,0,0,0]
                   ];
                   Gateway::sendToClient($client_id,json_encode($return));
               },[$client_id],true);
               
           } elseif ($messageDecode['type'] == 'env') { //@路超，首页环境部分
               Timer::add(60, function($client_id) {
                   $return['state'] = 'success';
                   //查询
                   $db = new \DB();
                   $data = $db->table('site_env')->order('id desc')->limit(1)->select('pm10,wind_sc,tmp,hum');
                   if ($data) {
                       $return['data'] = $data[0]; //发生视频报警事件
                   }
                   // 向某客户端发送
                   Gateway::sendToClient($client_id, json_encode($return));
               }, [$client_id], true);
               
		   } elseif ($messageDecode['type'] == 'video') { //@陈振华，首页视频监控部分
				
				Timer::add(10, function($client_id) {
					$return['state'] = 'success';
					//查询
					$db = new \DB();
					
					$report = $db->table('site_error_report')->where("event_state = 1 and event_type = 'video'")->order('id desc')->limit('1')->select('id, event_name');
					$return['data']['report'] = 2; //没有视频报警事件
					if ($report) {
					    $return['data']['report'] = 1; //发生视频报警事件
					}
					
// 					$return['data']['report_churu']    = 2; //出入区域 没有视频报警事件
// 					$return['data']['report_shigong']  = 2; //施工区域
// 					$return['data']['report_jiagong']  = 2; //加工区域
// 					$return['data']['report_shenghuo'] = 2; //生活区域
					
// 					$where = "event_state = 1 and event_type = 'video'";
// 					$churu = $db->table('site_error_report')->where($where." and ext_info_2 = 'churu'")->order('id desc')->limit('1')->select('id');
// 					if ($churu) {
// 						$return['data']['report_churu'] = 1; //有未处理视频报警事件
// 					}
// 					$shigong = $db->table('site_error_report')->where($where." and ext_info_2 = 'shigong'")->order('id desc')->limit('1')->select('id');
// 					if ($shigong) {
// 					    $return['data']['report_shigong'] = 1;
// 					}
// 					$jiagong = $db->table('site_error_report')->where($where." and ext_info_2 = 'jiagong'")->order('id desc')->limit('1')->select('id');
// 					if ($jiagong) {
// 					    $return['data']['report_jiagong'] = 1;
// 					}
// 					$shenghuo = $db->table('site_error_report')->where($where." and ext_info_2 = 'shenghuo'")->order('id desc')->limit('1')->select('id');
// 					if ($shenghuo) {
// 					    $return['data']['report_shenghuo'] = 1;
// 					}
					// 向某客户端发送
					Gateway::sendToClient($client_id, json_encode($return));
			   }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'video_list') { //@陈振华，视频监控二级列表页。
				
				Timer::add(10, function($client_id) {
					$return['state'] = 'success';
					//查询
					$db = new \DB();
					$where = "event_state = 1 and event_type = 'video' and created_at > '".date('Y-m-d 00:00:00')."'";
					$report = $db->table('site_error_report')->where($where)->order('id desc')->select('id, event_name, ext_info');
					$return['data']['report_sum'] = 0; //没有视频报警事件
					$return['data']['report_list'] = array();
					if ($report) {
						$return['data']['report_sum'] = count($report); //发生视频报警事件总数
						foreach ($report as $key => $value) {
						    //报警事件描述
						    $temp['id'] = $value['id'];
						    $temp['name'] =  trim($value['event_name'], ':');
						    //报警图片
						    $extInfo = unserialize($value['ext_info']);
						    if ($extInfo['ext_info']) { //解析XML
						        $xmlString = $extInfo['ext_info'];
						        $parser = xml_parser_create();
                                xml_parse_into_struct($parser, $xmlString, $vals, $keys);
                                xml_parser_free($parser);
                                $picUrl = $vals[$keys['PICURL'][0]]['value'];
                                $picUrlArray = explode(';', $picUrl);
                                if (is_array($picUrlArray)) {
                                    foreach ($picUrlArray as $k => $v) { //只取第一张
                                        $temp['pic_url'] = 'http://120.27.31.232:6025'.$v;
                                        break;
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
			   
		   } elseif ($messageDecode['type'] == 'report_all') { //@陈振华，首页动态报警框列表部分
		       Timer::add(5, function($client_id) {
		           $return['state'] = 'success';
		           
		           //事件类型名称
		           $eventName = array(
		               'video'     => '视频监控',
		               'electric'  => '电力监控',
		               'tower'     => '塔吊',
		               'elevator'  => '升降机',
		               'door'      => '门禁',
		               'userinfo'  => '人员定位'
		           );
		           //查询
		           $db = new \DB();
		           $where = "event_state = 1";
		           $report = $db->table('site_error_report')->where($where)->order('id desc')->limit('10')->select('id, event_name, event_type');
		           $return['data']['report_sum'] = 0; //没有报警事件
		           $return['data']['report_list'] = array();
		           if ($report) {
		               //获取上一次查询点
		               $sessData = Gateway::getSession($client_id);
		               $lastId = is_array($sessData) && count($sessData) > 0 ? $sessData['report_last_id'] : 0;
		               $baseFlag = $lastId;
		               
		               foreach ($report as $key => $value) {
		                   $lastId = $value['id'] > $lastId ? $value['id'] : $lastId;
		                   //报警事件描述
		                   $temp['id'] = $value['id'];
		                   $temp['name'] = $eventName[$value['event_type']].'：'.$value['event_name'];
		                   $return['data']['report_list'][$key] = $temp;
		               }
		               if ($lastId > $baseFlag) {
		                   $return['data']['report_sum'] = count($report); //返回报警事件数
		               }
		               //记录最新查询点
		               Gateway::setSession($client_id, array('report_last_id' => $lastId));
		           }
		           // 向某客户端发送
		           Gateway::sendToClient($client_id, json_encode($return));
		           
		       }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'report_sum') { //@陈振华，汇总的报警数，用于各页面顶部
		       
                Timer::add(5, function($client_id) {
                    $return['state'] = 'success';
		            
                    //查询
                    $db = new \DB();
                    $where = "event_state = 1";
                    $reportAll = $db->table('site_error_report')->where($where)->select('id');
                    $return['data']['report_sum'] = count($reportAll);
                    
                    // 向某客户端发送
                    Gateway::sendToClient($client_id, json_encode($return));
		            
		       }, [$client_id], true);
               
           } elseif ($messageDecode['type'] == 'user_info') { //@陈振华，首页人员定位部分
                                
                Timer::add(15, function($client_id) {
                    $return['state'] = 'success';
                    $return['data']['yuejie'] = mt_rand(0,1); //越界
                    $return['data']['diaoxian'] = 0; //掉线
                    $return['data']['didian'] = 0; //低电
                    $return['data']['stop'] = mt_rand(0,1); //长时间静止
                    $return['data']['sum'] = $return['data']['yuejie']+$return['data']['diaoxian']+$return['data']['didian']+$return['data']['stop']; //汇总
                    
                    // 向某客户端发送
                    Gateway::sendToClient($client_id, json_encode($return));
				   
                }, [$client_id], true);
                
//                 Timer::add(15, function($client_id) {
//                     $return['state'] = 'success';
//                     //查询
//                     $db = new \DB();
//                     $where = "event_state = 1 and event_type = 'userinfo' and created_at > '".date('Y-m-d 00:00:00')."'";
//                     $report = $db->table('site_error_report')->where($where)->order('id desc')->select('id, event_name, ext_info');
//                     $return['data']['sum']       = 0; //总报警事件数
//                     $return['data']['yuejie']    = 0; //越界报警事件数
//                     $return['data']['diaoxian']  = 0; //掉线报警事件数
//                     $return['data']['didian']    = 0; //低电报警事件数
//                     $return['data']['stop']   = 0; //长时间静止报警事件数
//                     if ($report) {
                        
//                         foreach ($report as $key => $value) {
//                             $extInfo = unserialize($value['ext_info']);
//                             if (is_array($extInfo['data'])) {
//                                 foreach ($extInfo['data'] as $key => $value) {
//                                     if ($value['warningType'] == 1) { //越界报警
//                                         $return['data']['yuejie'] += 1;
                                        
//                                     } elseif($value['warningType'] == 2) { //掉线提示
//                                         $return['data']['diaoxian'] += 1;
                                        
//                                     } elseif($value['warningType'] == 3) { //低电提示
//                                         $return['data']['didian'] += 1;
                                        
//                                     } elseif($value['warningType'] == 4) { //长时间静止
//                                         $return['data']['stop'] += 1;
//                                     }
//                                 }
//                             }
//                         }
//                         //发生报警事件总数
//                         $return['data']['sum'] += $return['data']['yuejie'];
//                         $return['data']['sum'] += $return['data']['diaoxian'];
//                         $return['data']['sum'] += $return['data']['didian'];
//                         $return['data']['sum'] += $return['data']['stop'];
//                     }
//                     // 向某客户端发送
//                     Gateway::sendToClient($client_id, json_encode($return));
                    
//                 }, [$client_id], true);
			   
		   } elseif ($messageDecode['type'] == 'door') { //@陈振华，首页，门禁|上岗职工|访客
		       
		       Timer::add(10, function($client_id) {
		           $return['state'] = 'success';
		           //门禁
		           $return['data']['door_sum']        = 0;
		           $return['data']['door_guanli']     = 0;
		           $return['data']['door_jianli']     = 0;
		           $return['data']['door_shigong']    = 0;
		           //上岗
		           $return['data']['person_zhigong']  = array();
		           $return['data']['person_fangke']   = array();
		           //查询
		           $db = new \DB();
		           $personData = $db->table('site_person_position_logs')->order('id desc')->limit('1')->select('id,data');
		           if ($personData) {
		               foreach ($personData as $key => $value) {
		                   $data = json_decode($value['data'], true);
		                   //门禁
        		           $return['data']['door_sum']        = $data['door']['sum'];
        		           $return['data']['door_guanli']     = $data['door']['guanli'];
        		           $return['data']['door_jianli']     = $data['door']['jianli'];
        		           $return['data']['door_shigong']    = $data['door']['shigong'];
        		           //上岗 - 职工
        		           if (!empty($data['person']['zhigong'])) {
        		               foreach ($data['person']['zhigong'] as $key => $value) {
        		                   $temp['number'] = $value['empno'];
        		                   $temp['name'] = $value['empname'];
        		                   $return['data']['person_zhigong'][] = $temp;
        		               }
        		           }
        		           //上岗 - 访客
        		           if (!empty($data['person']['fangke'])) {
        		               foreach ($data['person']['fangke'] as $key => $value) {
        		                   $temp['number'] = $value['empno'];
        		                   $temp['name'] = $value['empname'];
        		                   $return['data']['person_fangke'][] = $temp;
        		               }
        		           }
		               }
		           }
		           // 向某客户端发送
		           Gateway::sendToClient($client_id, json_encode($return));
		           
		       }, [$client_id], true);

           } elseif ($messageDecode['type'] == 'elevator_second') { //@路超，塔吊&升降机二级。
               $where = 'number = '.$messageDecode['number'].' and type ='.$messageDecode['device_type'];
               Timer::add(5, function($client_id, $where) {
                   $return['state'] = 'success';
                   //查询
                   $db = new \DB();
                   $data = $db->table('site_elevator_logs')->where($where)->order('id desc')->limit(1)->select();
                   if ($data) {
                       $return['data'] = $data[0];
                   }else{
                       $return['state'] = 'error';
                   }
                   // 向某客户端发送
                   Gateway::sendToClient($client_id, json_encode($return));
               }, [$client_id, $where], true);
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
