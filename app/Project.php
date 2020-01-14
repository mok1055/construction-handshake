<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'name', 'description', 'status_id', 'start_date', 'end_date',
    ];

    protected $table = 'project';

    public function users()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id')->get();
    }

    public function status() {
        return $this->belongsTo('App\ProjectStatus')->first()->name;
    }

    public function contains(User $user) {
        return $this->users()->contains($user);
    }
}
