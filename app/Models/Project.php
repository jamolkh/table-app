<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
