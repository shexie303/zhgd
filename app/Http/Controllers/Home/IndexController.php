<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends HomeController
{
    public function Index()
    {
        return view('default/index');
    }

}