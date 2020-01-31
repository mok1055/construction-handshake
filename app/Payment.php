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

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_id', 'wallet')->get();
    }

    public function wallet(User $userid)
    {
        return $this->belongsTo('App\User')->first()->wallet;
    }

    public function payAfterRating() {
        $user_id = User::select('user_id')->get();
        $mark = Rating::select('mark')->where();

        if(canPay ==true) {

        }
        
    }
}
