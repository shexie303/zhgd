<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends HomeController
{
    public function Index()
    {
        $env = DB::table('site_env')->orderBy('id', 'desc')->first();
        if($env){
            $data['env'] = $env;
        }else{
            $data['env'] = new \stdClass();
            $data->tmp = 0;
            $data->hum = 0;
            $data->wind_sc = 0;
            $data->pm10 = 0;
        }
        return view('default/index', $data);
    }

}