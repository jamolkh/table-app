<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    public function getTypeAttribute($value)
    {
        if($value=== 'fixed') return 'Постоянные Затраты';
        return 'Переменные Затраты';
    }

    public function month_costs()
    {
        return $this->hasMany(MonthCost::class);
    }

}
