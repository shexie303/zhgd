<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            //CN101030100 天津
            //CN101030300 天津宝坻
            //https://free-api.heweather.com/s6/air/now
//            $weather_url = 'https://free-api.heweather.com/s6/weather/now?location=CN101030300&key=074c90cdd2ca4ae6a1e77a6311a71eaa';
//            $weather_res = file_get_contents($weather_url);
//            if($weather_res){
//                $weather_res = json_decode($weather_res, true);
//                if($weather_res && isset($weather_res['HeWeather6'][0]) && $weather_res['HeWeather6'][0]['status'] == 'ok'){
//                    $data = [
//                        'tmp' => $weather_res['HeWeather6'][0]['now']['tmp'],
//                        'hum' => $weather_res['HeWeather6'][0]['now']['hum'],
//                        'wind_sc' => $weather_res['HeWeather6'][0]['now']['wind_sc']
//                    ];
//                    $air_url = 'https://free-api.heweather.com/s6/air/now?location=CN101030100&key=074c90cdd2ca4ae6a1e77a6311a71eaa';
//                    $air_res = file_get_contents($air_url);
//                    $air_res = json_decode($air_res, true);
//                    if($air_res && isset($air_res['HeWeather6'][0]) && $air_res['HeWeather6'][0]['status'] == 'ok'){
//                        $data['pm10'] = $air_res['HeWeather6'][0]['air_now_city']['pm10'];
//                        DB::table('site_env')->insert($data);
//                    }
//                }
//            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
