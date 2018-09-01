<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteErrorReport extends Model
{
    /**
     * 消息中心的数据表
     *
     * @var string
     */
    protected $table = 'site_error_report';
    
    /**
     * event_type字段对应的类型中文名
     * 
     * @var array
     */
    const EVENT_TYPE = array (
        'video'     => '视频监控',
        'electric'  => '电力监控',
        'tower'     => '塔吊',
        'elevator'  => '升降机',
        'door'      => '门禁',
        'userinfo'  => '人员定位'
    );
}
