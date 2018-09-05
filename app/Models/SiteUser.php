<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Administrator.
 *
 * @property Role[] $roles
 */
class SiteUser extends Model implements AuthenticatableContract
{
    use Authenticatable, AdminBuilder, HasPermissions;

    protected $fillable = ['username', 'password', 'name', 'avatar'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable('site_users');

        parent::__construct($attributes);
    }
    
    /**
     * A constructions belongs to many users.
     *
     * @return BelongsToMany
     */
    public function constructions() : BelongsToMany
    {
        $pivotTable = config('admin.database.site_user_constructions_table');
    
        $relatedModel = config('admin.database.site_constructions_model');
    
        return $this->belongsToMany($relatedModel, $pivotTable, 'user_id', 'construction_id');
    }
    
    /**
     * A report_groups belongs to many users.
     *
     * @return BelongsToMany
     */
    public function error_report_groups() : BelongsToMany
    {
        $pivotTable = 'site_user_report_groups';
    
        $relatedModel = \App\Models\SiteErrorReportGroups::class;
    
        return $this->belongsToMany($relatedModel, $pivotTable, 'user_id', 'group_id');
    }

    /**
     * 检测用户是否存在以及与工地的分配情况
     * @param $username
     * @param $constructions_id
     * @return array
     */
    public static function checkUserConstructions($username, $constructions_id)
    {
        $user = self::where('username', $username)->first();
        if($user){
            $cons = $user->constructions->toArray();
            if($cons){
                $cons_id = [];
                foreach($cons as $val){
                    $cons_id[] = $val['id'];
                }
                if(!in_array($constructions_id, $cons_id)){
                    return ['code' => 3, 'message' => '该账号与工地不匹配！'];
                }
            }else{
                return ['code' => 2, 'message' => '该账号未分配工地！'];
            }
        }else{
            return ['code' => 1, 'message' => '账号不存在！'];
        }
        return ['code' => 0];
    }
}
