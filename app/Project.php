<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'name', 'description', 'type', 'status', 'start_date', 'end_date',
    ];

    protected $table = 'project';
    protected $primaryKey = 'project_id';

    public function users()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id');
    }
}
