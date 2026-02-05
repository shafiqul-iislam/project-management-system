<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'project_id',
        'developer_id',
        'status',
        'priority',
    ];

    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    protected static function booted()
    {
        static::creating(function ($task) {
            $task->slug = \Illuminate\Support\Str::slug($task->title) . '-' . \Illuminate\Support\Str::random(6);
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
