<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'mark', 'comments', 'image_path'
    ];

    protected $table = 'rating';
}
