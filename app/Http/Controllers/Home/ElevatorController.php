<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class ElevatorController extends HomeController
{
    public function Index()
    {
        return view(self::HOME_VIEW_PREFIX . '/tower_crane/index');
    }

}