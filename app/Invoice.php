<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'invoice_id', 'project_id', 'amount', 'date'];

    protected $table = 'invoice';
    protected $primaryKey = 'invoice_id';

    public function projects()
    {
        return $this->belongsToMany('App\Invoice', 'invoice_projects', 'invoice_id', 'project_id');
    }
}
