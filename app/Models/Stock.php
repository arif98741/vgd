<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stocks";

    protected $fillable = [
        'month', 'year', 'number_of_card', 'amount', 'union_id', 'status',
    ];

    public function union()
    {
        return $this->belongsTo(Union::class);
    }
}
