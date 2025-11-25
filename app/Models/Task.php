<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

     public function users()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id')->withTimestamps();
    }
}
