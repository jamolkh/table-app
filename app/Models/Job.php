<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function month_jobs()
    {
        return $this->hasMany(MonthJob::class);
    }
}
