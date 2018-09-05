<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SiteErrorReportGroups extends Model
{
    protected $fillable = ['name', 'module', 'type'];
    
    /**
     * type类型字段的说明
     */
    const GROUP_TYPE = array (
        1 => '处理报警组',
        2 => '汇报对象组'
    );

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable('site_error_report_groups');

        parent::__construct($attributes);
    }
    
    /**
     * A role belongs to many users.
     *
     * @return BelongsToMany
     */
    public function site_users() : BelongsToMany
    {
        $pivotTable = 'site_user_report_groups';
    
        $relatedModel = config('admin.database.site_users_model');
    
        return $this->belongsToMany($relatedModel, $pivotTable, 'group_id', 'user_id');
    }

    /**
     * Detach models from the relationship.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            //$model->administrators()->detach();

        });
    }
}
