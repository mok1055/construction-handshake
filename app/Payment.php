<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    
    protected $dates = ['datestamp'];

    protected $fillable = [
            'block_id', 'from', 'to', 'amount', 'datestamp',
        ];

        protected $table = 'payment';
}
