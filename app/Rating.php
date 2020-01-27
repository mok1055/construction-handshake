<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Rating extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'mark', 'comments', 'image_path'
    ];

    protected $table = 'rating';

    public function user()
    {
        return $this->belongsTo('App\User')->first();
    }
}
