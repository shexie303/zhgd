<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function towerCrane(Request $request)
    {
        $return = [
            'code' => 0
        ];
        if($request->method() == 'POST'){
            Log::error('towerCrane',$request->all());
        }else{
            $return['code'] = 1002;
        }
        return response()->json($return);
    }
}