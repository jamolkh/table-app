<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthCost extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
}
