<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'project_id',
        'status',
        'priority',
        'order',
        'deadline',
        'completed_at',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'completed_at' => 'datetime',
        'order' => 'integer',
        'permissions' => 'array',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_users', 'task_id', 'user_id')->withTimestamps();
    }
}
