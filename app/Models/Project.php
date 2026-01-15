<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'started_at',
        'ended_at',
        'finished_at',
        'created_by_username',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id')->withTimestamps();
    }
}
