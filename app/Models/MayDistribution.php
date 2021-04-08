<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MayDistribution extends Model
{
    protected $fillable = [
        'beneficiary_id', 'beneficiary_id', 'union_id','month','status','distribution_date'
    ];
}
