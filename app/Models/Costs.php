<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costs extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getTypeAttribute($value)
    {
        if($value=== 'fixed') return 'Постоянные Затраты';
        return 'Переменные Затраты';
    }
}
