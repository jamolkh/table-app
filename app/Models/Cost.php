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

    public function total_month_costs()
    {
        return $this->hasMany(TotalMonthCost::class);
    }

    // public function getAmountAttribute($value)
    // {
    //     return number_format($value);
    // }

    public function amount_format()
    {
        return number_format($this->amount);
    }

    public function month_total_variable_cost( $type, $i,Project $project)
    {
        $sum=0;
        $costs = $project->costs()->where('type', $type)->get();
        if($costs->first()->month_costs->where('month_order', $i)->first()->amount)
        {
        foreach($costs as $cost)
        {
            $sum += $cost->month_costs->where('month_order', $i)->first()->amount;
        }
        }
        return $sum;
    }
    public function month_total_cost($i,Project $project)
    {
        $sum=0;
        $costs = $project->costs()->get();

        foreach($costs as $cost)
        {
            $sum += $cost->month_costs->where('month_order', $i)->first()->amount;
        }

        return $sum;
    }

}
