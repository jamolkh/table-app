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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function month_total_variable_cost($type, $i)
    {
        $sum=0;
        $variable_costs = $this->where('type', $type)->get();
        if($variable_costs->first()->month_costs->where('month_order', $i)->first()->amount)
        {
        foreach($variable_costs as $cost)
        {
            $sum += $cost->month_costs->where('month_order', $i)->first()->amount;
        }
    }
        return $sum;
    }

}
