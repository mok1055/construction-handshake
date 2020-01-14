<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = [
        'user_id', 'project_id'
    ];

    protected $table = 'project_user';

    public static function destroy($id)
    {
        $song = $this->model->find($id);
        return $song->delete();
    }

    public static function find($projectId, $userId) {
        return ProjectUser::where('project_id', $projectId)->
                             where('user_id', $userId)->get();
    }
}
