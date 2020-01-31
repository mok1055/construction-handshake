<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'wallet',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'user';

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'project_user', 'user_id', 'project_id')->get();
    }

    public function role()
    {
        return $this->belongsTo('App\UserRole')->first()->name;
    }

    public function walletAdress(User $userid)
    {
        return User::select('wallet')->where('user_id', $userid)->get();
    }

    public function canCreateEditProject()
    {
        return $this->role() == 'Opdrachtgever';
    }

    public function canAddDeleteUser()
    {
        return $this->role() == 'Opdrachtgever' || $this->role() == 'Hoofdaannemer';
    }

    public function canEditStatus()
    {
        return $this->role() == 'Hoofdaannemer';
    }

    public function canViewRatings()
    {
        return $this->role() == 'Hoofdaannemer';
    }

    public function canViewRating(Rating $rating)
    {
        if ($this->role() == 'Hoofdaannemer') {
            return true;
        }
        return $rating->user_id == $this->id;
    }
}
