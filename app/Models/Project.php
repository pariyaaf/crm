<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'client_id'  	
    ];
    public function client()
{
    return $this->hasOne('App\Models\Client');
}

public function task()
{
    return $this->hasMany('App\Models\task');
}
}

