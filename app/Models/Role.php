<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'role_type',
        'description',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
