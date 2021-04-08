<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table="stocks";

    protected $fillable = [
        'month', 'year', 'amount','user_id','status',
    ];
}
