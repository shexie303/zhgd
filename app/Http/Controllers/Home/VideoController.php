<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class VideoController extends HomeController
{
    public function Index()
    {
        return view(self::HOME_VIEW_PREFIX . '/video/index');
    }

}