<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    protected $fillable = [
        'user_id', 'project_id'
    ];

    protected $table = 'project_user';

    public function users() {
        return $this->belongsToMany('App\User', 'project_user');
    }

    public function projects() {
        return $this->belongsToMany('App\Project', 'project_user');
    }

    public static function find($projectId, $userId) {
        return ProjectUser::where('project_id', $projectId)->
                            where('user_id', $userId)->get();
    }
}
