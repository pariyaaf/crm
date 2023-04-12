<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [

    'name',	'task_for_id'];
    use HasFactory;
    public function project()
    {
        return $this->hasOne('App\Models\Project');
    }
}
