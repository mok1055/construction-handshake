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

    public function ratings()
    {
        return $this->hasMany(Rating::class)->get();
    }

    public function status()
    {
        return $this->belongsTo('App\ProjectStatus')->first();
    }

    public function contains(User $user)
    {
        return $this->users()->contains($user);
    }

    public function isClosed()
    {
        return $this->status()->name == 'Gesloten';
    }

    public function containsRating(string $role)
    {
        $hasRated = false;
        foreach ($this->ratings() as $rating) {
            $user = User::find($rating->user_id);
            if ($user == null) {
                continue;
            }
            if ($user->role() == $role) {
                $hasRated = true;
                break;
            }
        }
        return $hasRated;
    }

    public function canRate(User $user)
    {
        if (!$this->isClosed()) {
            return false;
        }
        if ($this->containsRating($user->role())) {
            return false;
        }
        if ($user->role() != 'Uitvoerder' && $user->role() != 'Hoofdaannemer') {
            return false;
        }
        if ($user->role() == 'Hoofdaannemer' && !$this->containsRating('Uitvoerder')) {
            return false;
        }
        return true;
    }

}
