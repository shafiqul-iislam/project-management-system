<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{

    protected $table = "project_users";
    protected $fillable = [
        'project_id',
        'developer_id',
        'assigned_at',
    ];

    public $timestamps = false;

    protected $dates = [
        'assigned_at',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
