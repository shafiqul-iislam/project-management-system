<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
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

    protected $casts = [
        'status' => ProjectStatusEnum::class,
    ];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'project_users', 'project_id', 'developer_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
