<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteElevatorLogs extends Model
{
    const WARNING_TYPES = [
        'height_warning' => '高度',
        'range_warning' => '幅度',
        'angle_warning' => '角度',
        'weight_warning' => '承重量',
        'moment_warning' => '力矩',
        'wind_speed_warning' => '风速',
        'speed_warning' => '速度',
        'dip_angle_warning' => '倾角'
    ];
}
