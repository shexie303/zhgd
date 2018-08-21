<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\SiteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->method() == 'POST' && $request->ajax()){
            $return = [
                'code' => 0,
                'data' => [],
                'message' => ''
            ];
            $validator = Validator::make($input = $request->all(),[
                'account' => 'bail|required',
                'pass' => 'bail|required',
                'cons' => 'bail|required|int|min:1|max:3'
            ]);
            if($validator->fails()){
                $errors = $validator->errors()->all();
                $return['code'] = 4;
                $return['message'] = $errors[0];
                return response()->json($return);
            }
            $check = SiteUser::checkUserConstructions($input['account'], $input['cons']);
            if($check['code'] > 0){
                $return['code'] = $check['code'];
                $return['message'] = $check['message'];
                return response()->json($return);
            }else{
                $data = ['username' => $input['account'],'password' => $input['pass']];
                if(!Auth::attempt($data)){
                    $return['code'] = 5;
                    $return['message'] = '账号密码不匹配！';
                    return response()->json($return);
                }
                session(['login_user_constructions_id' => $input['cons']]);
            }
            return response()->json($return);
        }else{
            if($request->user()){
                return redirect('/');
            }
            return view('default/auth/login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/auth/login');
    }

    public function menu(Request $request)
    {
        $user = $request->user();
        if($user){
            $p = $user->allPermissions();
            $menu = Permission::mainModular();
            if(!$p->isEmpty()){
                $menu_keys = array_keys($menu);
                foreach($p as $val){
                    if($val->slug == '/'){
                        return redirect('/');
                    }
                    if(in_array($val->slug, $menu_keys)){
                        $menu[$val->slug][1] = 1;
                    }
                }
            }
            return view('default/auth/menu',['menu' => $menu]);
        }else{
            return redirect('/auth/login');
        }
    }
}