<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    const HOME_VIEW_PREFIX = 'default';
    protected $site_user;
    protected $all_permissions;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->site_user = Auth::user();
            if (!$this->site_user->allPermissions()->first(function ($permission) use ($request) {
                return $permission->shouldPassThrough($request);
            })){
                return response('暂无权限');
            }
            return $next($request);
        });
    }

}